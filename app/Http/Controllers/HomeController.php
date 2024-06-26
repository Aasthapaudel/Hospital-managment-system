<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    //
    public function redirect(){

        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor=doctor::all();
                return view('user.home',compact('doctor'));

            }
            else
            {
                $doctor=doctor::all();
                return view('user.home',compact('doctor'));            }
        }
        else{
            return redirect()->back();
        }
    }

    public function index(){

        if(Auth::id())
        {
            return redirect('home');
        }
        else{
            $doctor = doctor::all();
        }
        return view('user.home',compact('doctor'));
    }
    public function appointment(Request $request)
    {
        $data = new appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;

        $data->phone=$request->phone;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status='In progress';
        if (Auth::id())
        {


        $data->user_id=Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message','Appointment Request Successful. We will contact you soon!');
    }
    public function doctor(){
        $doctor=Doctor::all();
        return view('user.doctor',compact('doctor'));
    }
    public function about(){
        return view('user.about');
    }
    public function contact(){
        return view('user.contact');
    }
    public function latest(){
        return view('user.latest');
    }
    public function getappointment(){
        $doctor=Doctor::all();

        return view('user.getappointment',compact('doctor'));
    }
    public function showappointment(){
        $appointments = Appointment::where('user_id', Auth::id())->get();

        return view('user.showappointment',compact('appointments'));
    }
}


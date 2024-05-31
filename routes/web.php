<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home',[homeController::class,'redirect'])->middleware('auth');
Route::get('/',[homeController::class,'index']);
Route::get('/add_doctor',[AdminController::class,'addview'])->middleware('auth');
Route::get('/adminhome',[AdminController::class,'index'])->middleware('auth');
Route::post('/upload_doctor',[AdminController::class,'upload'])->middleware('auth');
Route::post('/appointment',[HomeController::class,'appointment'])->middleware('auth');
Route::get('/getappointment',[HomeController::class,'getappointment'])->middleware('auth');
Route::get('/showappointment',[HomeController::class,'showappointment'])->middleware('auth');
Route::get('/doctor',[HomeController::class,'doctor'])->middleware('auth');
Route::get('/latest',[HomeController::class,'latest'])->middleware('auth');
Route::get('/contact',[HomeController::class,'contact']);
Route::get('/about',[HomeController::class,'about']);






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

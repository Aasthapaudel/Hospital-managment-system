<!DOCTYPE html>
<html lang="en">

<head>

    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
        }
        button{
            float:right;
        }
    </style>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">

        <!-- </div> -->
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">


            <h1>Add Doctor</h1>
            <div class="container" align="center" style="padding-top:100px;">

                @if(session()->has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>

                    {{session()->get('message')}}
                </div>



                @endif


                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style=" padding:15px;">
                        <label>Doctor Name</label>
                        <input type="text" style="color:black" name="name" placeholder="write the name" required="">

                    </div>
                    <div style="padding:15px;">
                        <label>Phone</label>
                        <input type="number" style="color:black" name="number" placeholder="write the number"
                            required="">

                    </div>
                    <div style="padding:15px;">
                        <label>Speciality</label>
                        <select name="speciality" style="color:black;width:200px;">
                            <option>--Select</option>
                            <option value="skin">skin</option>
                            <option value="heart">heart</option>
                            <option value="eye">eye</option>
                            <option value="nose">nose</option>
                        </select>
                        <!-- <input type="text" style="color:black" name="name" placeholder="write the name"> -->

                    </div>
                    <div style="padding:15px;">
                        <label>Room No</label>
                        <input type="text" style="color:black" name="room" placeholder="write the room no" required="">

                    </div>
                    <div style="padding:15px;">
                        <label>Doctor image</label>
                        <input type="file" name="file" required="">

                    </div>
                    <div style="padding:15px;">
                        <input type="submit" class="btn btn-success">
                    </div>

                </form>
            </div>
        </div>

        <!-- container-scroller -->

        <!-- plugins:js -->
        </body>
        @include('admin.script')
        <!-- End custom js for this page -->


</html>

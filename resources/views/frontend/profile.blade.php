@extends('layouts.app')
@section('title',"My Profile")
@section('content')

<section class="py-5">
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            @if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif
            <h4> My Profile</h4>
            <hr>
            <a href="{{ url('change-password')}}" class="btn btn-info">Change Password</a>
        
   <form action="{{url('profile_update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
        <div class="form-group">
        <label for="">First Name</label>
        <input type="text" name="fname" class="form-control" value=" {{Auth::user()->fname}} ">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label for="">Last Name</label>
        <input type="text" name="lname" class="form-control" value=" {{Auth::user()->lname}} ">
        </div>
        </div>
        </div>
    
        <div class="row">
        <div class="col-md-4">
        <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" readonly value=" {{Auth::user()->email}} ">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label for="">Phone No</label>
        <input type="text" name="phone_no" class="form-control" value=" {{Auth::user()->phone_no}} ">
        </div>
        </div>
        </div>

        <div class="row">
        <div class="col-md-4">
        <div class="form-group">
        <label for="">Gender</label>
        <select name="gender" class="form-select" aria-label="Default select example"> 
              <option value="M">M</option>
              <option value="F">F</option>
         </select>
         </div>
        </div>
      


        <div class="col-md-4">
        <div class="form-group">
        <label for="">Pincode/Zipcode</label>
        <input type="text" name="zipcode" class="form-control" value=" {{Auth::user()->zipcode}} ">
        </div>
        </div>
        </div>

        <div class="col-md-8">
        <div class="form-group">
        <label for="">Address (Street, City, province, Country)</label>
        <input type="text" name="address" class="form-control" value=" {{Auth::user()->address}} ">
        </div>
        </div>
        <br>

        <div class="col-md-4">
            <input type="file" name="image" class="form-control" >
                <img  src="{{ asset('uploads/profile/'.Auth::user()->image)}}" class="rounded-circle" width="100" height="100" alt="img">
                </div>
<br>
        
        <div class="col-md-8">
        <div class="form-group">
           
  <center>  <button type="submit" class="btn btn-primary">Update Profile</button></center> 
        </div>
        </div>
       
        

    </div>
   
</form>

            </div>
        </div>
    </div>
</div>
</div>

</section>
@endsection
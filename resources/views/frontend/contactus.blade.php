@extends('layouts.app')
@section('title',"Medigreen Herbal Products(PVT)")
@section('content')

<div class="container mt-5">


    <!--Section: Content-->
    <section class="dark-grey-text mb-5">

      <!-- Section heading -->
      <h2 class="font-weight-bold text-center mb-4">Contact Us</h2>
      <!-- Section description -->
      <p class="text-center w-responsive mx-auto pb-4 bg-light">Do you have any questions ? Simply drop a message ..! Our team will come back within
        a matter of hours to help you.</p>

      <!-- Grid row -->
      <div class="row">
        <div class="col-lg-5 mb-lg-0 pb-lg-3 mb-4">

          <div class="card">
            <div class="card-body">
                            @if(session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif
              <!-- Header -->
              <div class="form-header blue accent-1">
                <h3 class="mt-2"> Contact Form:</h3>
              </div>
             <div class="card">
                <div class="card-header">
                    <form action="{{url('send-message')}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                  <div class="form-group">
                  <label for="name">Your Name</label>
                <input type="text" name="name"  class="form-control">
               
                </div>
             
              <div class="form-group">
              <label for="email">Your Email</label>
                <input type="text"  name="email" class="form-control">
               
              </div>

              <div class="form-group">
              <label for="phone_no">Phone No</label>
                <input type="text"  name="phone_no"  class="form-control">
               
              </div>
             
              <div class="form-group">
              <label for="form-text">Send Message</label>
                <textarea  class="form-control md-textarea" name="msg"  rows="8"></textarea>
               
              </div>
             <br>
              <div class="text-center">
                <button type="submit" class="btn btn-success">Send </button>
              </div>

                    </form>
                </div>
             </div>
             
             
             
            </div>
          </div>
          <!-- Form with header -->

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-lg-7">

          <!-- Buttons-->
          <div class="card">
          <div class="card-header">
          <h3>Contact Information</h3>     
         
          <div class="card">
            <div class="card-body">
              <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1426.6788409147352!2d79.
                89973059844716!3d9.634749230176766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sward%20no
                %206%2C%20velanai!5e0!3m2!1sen!2slk!4v1692265003613!5m2!1sen!2slk" width="600" height="350" 
                style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="iframe"> <!--class name add-->
              </iframe> 
              
                <p>Address:{{$contactus->address}}</p>  
                 
              <h4></h4>
              <p>Phone Number:{{$contactus->phone1}}</p>
          
             <h4></h4>  
              <p>Email:{{$contactus->email1}}</p>    
              </div>       
          </div>

        </div>
      </div>
     

    </section>
    <!--Section: Content-->


  </div>
 
@endsection

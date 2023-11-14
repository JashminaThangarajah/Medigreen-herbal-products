@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" >
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">

</head>
  <body>

          @if(isset(Auth::user()->email))
      <script>Window.location="/sucess";</script>
      @endif
      @if ($message =Session::get('error'))
          <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{$message}}</strong>
      </div>
      @endif
      @if ($errors->any())
          <div class="alert alert-danger">
              <u1>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
              </u1>
          </div>
      <br/>
      @endif
  

      <div class="signin_img"><!--changed-->
        <h1><center> <div class="signin_header" ><!--changed-->
        <img src="{{asset('assets/images/medigreenlogo.png')}}" alt="image" style="width:70px;">
      </div></center></h1>
      
</div>
<div class="signin_box">

<form method= "post" action="#" class="signin_form">
    
    @csrf
   <h2 style="color:#198754">SignIn</h2>
    <div class="mb-3 row">
    <label for="inputemail" class="col-sm-2 col-form-label" style="--bs-success-bg-subtle">Email:</label>
    <div class="col-sm-10">
    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Username or email">
    </div>
  </div>

<div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label" style="--bs-success-bg-subtle">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
    </div>
  </div>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="success-outlined">
  <label class="form-check-label" for="flexCheckDefault">
  Remember me.
  </label>
</div>
   
   
  <div class="col-auto">
  <center>  <button type="submit" text-align="center" class="btn btn-success mb-3" >Login</button></center>
  </div>

                     
                           <span>  Don't have an account?
                            @if (Route::has('register'))
                                    <a class="btn btn-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>   
                            @endif</span>  
<br>
                              @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" >
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif 
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/jquery.js')}}" ></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>
@endsection

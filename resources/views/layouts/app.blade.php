<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- It will show the title in the webpage -->
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- bootstrap link -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">

    <!-- CSS for alertifyJs-->
    <link rel="stylesheet" href="{{asset('assets/css/alertify.min.css')}}"/>

     <!-- Styles -->
     <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">

      <!-- Owl Carousel Styles -->
      <link href="{{asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
      <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">

      <!--Font awesome for icons-->
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   
      <!-- My Styles -->
     <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
     <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
     

</head>
<body>
    <div id="app">
   
     @include('layouts.inc.frontend.frontend-navbar')
    

     <main class="">
            @yield('content')
        </main>

    </div>  

    @include('layouts.inc.frontend.frontend-footer')
     
    <!--
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Medigreen') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   
                    <ul class="navbar-nav me-auto">

                    </ul>

                   
                    <ul class="navbar-nav ms-auto">
                        
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
-->

 <!-- summornote -->
 <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}" ></script>
   

 <!--<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>  -->   

<!-- custom Js -->
<script src="{{asset('assets/js/custom.js')}}" ></script>

<!-- JavaScript for alertifyJS-->
<script src=" {{asset('assets/js/alertify.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" ></script>
      
   <!-- Owl Carousel Styles -->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}" ></script>
    <script>
        $('.category-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots: false,
    responsive:{
        0:{
            items:2 //This is for mobile application
        },
        600:{
            items:3
        },
        1000:{
            items:4 //This is for desktop
        }
    }
})
    </script>

</body>
</html>

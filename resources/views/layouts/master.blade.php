<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

<!-- Summornote css link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- datatable.net link -->
    <link href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        .dataTables_wrapper .dataTables_paginate .dataTables_button{
            padding: 0px !important;
            margin: 0px !important;
        }
        div.dataTables_wrapper div.dataTables_length select{
            width: 50% !important;
        }
    </style>
    
   
 <!-- google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

 


 

 
</head>
<body>

    @include('layouts.inc.admin-navbar')

    <div id="layoutSidenav">
    @include('layouts.inc.admin-sidebar')

                 <div id="layoutSidenav_content">
                <main>
               @yield('content')
                </main>
                @include('layouts.inc.admin-footer')
                </div>
    </div>
   
  

<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}" ></script>   <!-- summornote -->
 <!--<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>-->

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" ></script>
<script src="{{asset('assets/js/scripts.js')}}" ></script>
 
<!-- Summornote js link -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $("#mySummernote").summernote({
            height: 150,
        });
        $('.dropdown-toggle').dropdown();
    });
</script>

<!-- datatable.net link -->
<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" ></script>

<script>let table = new DataTable('#myDataTable');</script>


        
</body>
</html>

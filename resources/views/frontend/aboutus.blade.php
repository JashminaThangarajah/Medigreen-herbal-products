@extends('layouts.app')
@section('title',"Medigreen Herbal Products(PVT)")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 py-3 text-center">
        <h1>{{$about_s1->title}}</h1>
        </div>
        <h2>{{$about_s1->subtitle}}</h2>
        <br>
        <img src="{{ asset('uploads/aboutus/'.$about_s1->image)}}" class="rounded mx-auto " width="300px" height="400px" alt="img">
        <div class="col-md-12 py-3">
        <p>{!!$about_s1->description!!}</p>
        </div>
    </div>
</div>






@endsection
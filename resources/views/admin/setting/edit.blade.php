@extends('layouts.master')
@section('title','Edit Aboutus')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">

      
        <div class="card-header">
            <h4>Edit Aboutus
                <a href ="{{url('admin/aboutus')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

        @if($errors->any())
         @foreach($errors->all() as $error)
         <div>{{$error}}</div>
         @endforeach
         </div>
        @endif

            <form action="{{url('admin/update-aboutus/'.$aboutus->id)}}" method="POST" enctype="multipart/form-data" >
               @csrf
               @method('PUT')

               <div class="mb-3">
           <label for="">Title: </label>
           <input type="text" name="title" value="{{$aboutus->title}}"  class="form-control">
        </div>
        <div class="mb-3">
           <label for="">Sub Title:</label>
           <input type="text" name="subtitle" value="{{$aboutus->subtitle}}" class="form-control">
        </div>
        <div class="mb-3">
           <label for="">Image</label>
           <input type="file" name="image" class="form-control">
           <img src="{{ asset('uploads/aboutus/'.$aboutus->image)}}" width="80px" height="50px" alt="img">
        </div>
        <div class="mb-3">
           <label for="">Description:</label>
           <textarea type="text" name="description" id="mySummernote" class="form-control" rows="4">{{$aboutus->description}}</textarea>
        </div>


      
       
       

    

        
        
       

        <div class="col-md-8">
        <div class="col-3">
            <button type="submit" class="btn btn-success float-end">Update Aboutus </button>
           </div>
           </div>

        </form>
    </div>
</div>
</div>
@endsection
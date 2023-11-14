@extends('layouts.master')
@section('title','Add Aboutus')
@section('content')





<div class="container-fluid px-4">
    <div class="card mt-4">

    @if($errors->any())
         @foreach($errors->all() as $error)
         <div>{{$error}}</div>
         @endforeach
         </div>
        @endif

      
    
        <div class="card-body">
            <form action="{{url('admin/abouts')}}" method="POST" enctype="multipart/form-data" >
               @csrf
       
        <div class="mb-3">
           <label for="">Title: </label>
           <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
           <label for="">Sub Title:</label>
           <input type="text" name="subtitle" class="form-control">
        </div>
        <div class="mb-3">
           <label for="">Image</label>
           <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
           <label for="">Description:</label>
           <textarea type="text" name="description" id="mySummernote" class="form-control" rows="4"></textarea>
        </div>

       
        
       
       

        <div class="col-md-8">
        <div class="col-3">
            <button type="submit" class="btn btn-success float-end">Save  </button>
           </div>
           </div>

        </form>
    </div>
</div>
</div>

@endsection
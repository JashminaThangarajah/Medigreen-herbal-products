@extends('layouts.master')
@section('title','Edit Slider')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">

    @if($errors->any())
         @foreach($errors->all() as $error)
         <div>{{$error}}</div>
         @endforeach
         </div>
        @endif

      
        <div class="card-header">
            <h4>Edit Slider
                <a href ="{{url('admin/sliders/')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
                        @if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif

            <form action="{{url('admin/slider-update/'.$slider->id)}}" method="POST" enctype="multipart/form-data" >
               @csrf
               @method('PUT')
        <div class="mb-3">
           <label for=""> Title</label>
           <input type="text" name="title" value="{{$slider->title}}" class="form-control">
        </div>
        
        <div class="mb-3">
           <label for="">Description</label>
           <textarea type="text" name="description" id="mySummernote" class="form-control" rows="8" >{{$slider->description}}</textarea>
        </div>

        <div class="mb-3">
           <label for="">Image</label>
           <input type="file" name="image" class="form-control">
           <img src="{{ asset('uploads/slider/'.$slider->image)}}" width="80px" height="50px" alt="img"/>
        </div>
        
           <div class="row">
           <div class= "col">
        <h6>    <label>Status</label>
            <input type="checkbox" name="status" {{$slider->status == '1' ? 'checked':''}} style="height:20px; width:20px;"/><br></h6>
            Checked=Hidden,UnChecked=Visible
           </div>
           </div>

      
        <div class="col">
            <button type="submit" class="btn btn-success float-end">Update</button>
           </div>
       

        </form>
    </div>
</div>
</div>
@endsection
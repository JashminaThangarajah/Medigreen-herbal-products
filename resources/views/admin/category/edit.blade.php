@extends('layouts.master')
@section('title','Category')
@section('content')
            
<div class="container-fluid px-4">

<div class="card mt-4">
    <div class="card-header">
    <h1 class="">Edit Category</h1>
    </div>   
        <div class="card-body">
       <div class="alert alert-danger ">      
        @if($errors->any())
         @foreach($errors->all() as $error)
         <div>{{$error}}</div>
         @endforeach
         </div>
        @endif

          <form action="{{url('admin/update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PUT')
           <div class="mb-3">
            <label for="">Category Name</label>
            <input type="text" name="name" value="{{$category->name}}"class="form-control">
           </div>

           <div class="mb-3">
            <label for="">Slug</label>
            <input type="text" name="slug" value="{{$category->slug}}" class="form-control">
           </div>

           <div class="mb-3">
            <label for="">Description</label>
            <textarea type="text" name="description" id="mySummernote" class="form-control">{{$category->description}}</textarea>
           </div>

           <div class="mb-3">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('uploads/category/'.$category->image)}}" width="80px" height="50px" alt="img">
           </div>

           <h6>SEO Tags</h6>
           <div class="mb-3">
            <label for="">Meta Title</label>
            <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control">
           </div>

           <div class="mb-3">
            <label for="">Meta Description</label>
            <input type="text" name="meta_description" value="{{$category->meta_description}}"class="form-control">
           </div>

           <div class="mb-3">
            <label for="">Meta Keyword</label>
            <input type="text" name="meta_keyword" value="{{$category->meta_keyword}}" class="form-control">
           </div>

           <h6>Status Mode</h6>
           <div class="row">
           <div class= "col-md-3 mb-3">
            <label>Navbar Status</label>
            <input type="checkbox" name="navbar_status" {{$category->navbar_status == '1' ? 'checked':'' }}/>
           </div>
            
           <div class= "col-md-3 mb-3">
            <label >Status</label>
            <input type="checkbox" name="status" {{$category->status == '1' ? 'checked':'' }} />
           </div></div>

           <div class="col-md-6">
            <button type="submit" class="btn btn-success">Update Category</button>
           </div>


          </form>
        </div>
    

</div>
</div>
@endsection
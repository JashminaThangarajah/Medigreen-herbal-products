@extends('layouts.master')
@section('title','Edit Post')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">

      
        <div class="card-header">
            <h4>Edit Post
                <a href ="{{url('admin/posts')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

        @if($errors->any())
         @foreach($errors->all() as $error)
         <div>{{$error}}</div>
         @endforeach
         </div>
        @endif

            <form action="{{url('admin/update-post/'.$post->id)}}" method="POST" enctype="multipart/form-data" >
               @csrf
               @method('PUT')
        <div class="mb-3">
            <label for="">Category</label>
            <select name="category_id" required class="form-control">
            <option value="">Select Category</option>
           @foreach ($category as $cateitem)
           <option value="{{$cateitem->id}}">{{$cateitem->name}}</option>
               @endforeach
            </select>
        </div>
        <div class="mb-3">
           <label for="">Post name</label>
           <input type="text" name="name" value="{{$post->name}}" class="form-control">
        </div>
        <div class="mb-3">
           <label for="">Slug</label>
           <input type="text" name="slug" value="{{$post->slug}}" class="form-control">
        </div>
        <div class="mb-3">
           <label for="">Description</label>
           <textarea type="text" name="description" id="mySummernote" class="form-control" rows="4">{{$post->description}}</textarea>
        </div>
        <div class="mb-3">
           <label for="">Original Price</label>
           <input type="text" name="original_price" value="{{$post->original_price}}" class="form-control">
        </div>

        <div class="mb-3">
           <label for="">Selling Price</label>
           <input type="text" name="selling_price" value="{{$post->selling_price}}" class="form-control">
        </div>

        <div class="mb-3">
           <label for="">Qty</label>
           <input type="text" name="qty" value="{{$post->qty}}" class="form-control">
        </div>


        <div class="mb-3">
           <label for="">Image</label>
           <input type="file" name="image" class="form-control">
           <img src="{{ asset('uploads/post/'.$post->image)}}" width="80px" height="50px" alt="img">
        </div>
        
        <h4>SEO Tags</h4>
        <div class="mb-3">
           <label for="">Meta_title</label>
           <input type="text" name="meta_title" value="{{$post->meta_title}}" class="form-control">
        </div>
        <div class="mb-3">
           <label for="">Meta_description</label>
           <input type="text" name="meta_description" value="{{$post->meta_description}}" class="form-control">
        </div>
        <div class="mb-3">
           <label for="">Meta_keyword</label>
           <input type="text" name="meta_keyword" value="{{$post->meta_keyword}}" class="form-control">
        </div>
        
        
        <h4>Status</h4>
        
           <div class="row">
           <div class= "col-md-3 mb-3">
            <label >Status</label>
            <input type="checkbox" name="status" {{$post->status == '1' ? 'checked':'' }} />
           </div>
           </div>

        <div class="col-md-8">
        <div class="col-3">
            <button type="submit" class="btn btn-success float-end">Update Post </button>
           </div>
           </div>

        </form>
    </div>
</div>
</div>
@endsection
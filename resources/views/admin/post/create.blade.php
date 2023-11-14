@extends('layouts.master')
@section('title','Add Post')
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
            <h4>Add Post
                <a href ="{{url('admin/add-post')}}" class="btn btn-success float-end">Add Posts</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="{{url('admin/add-post1')}}" method="POST" enctype="multipart/form-data" >
               @csrf
        <div class="mb-3">
            <label for="">Category</label>
            <select name="category_id" class="form-control">
               @foreach($category as $cateitem)
                    <option value="{{$cateitem->id}}">{{$cateitem->name}}</option>
               @endforeach
               
            </select>
        </div>
        <div class="mb-3">
           <label for="">Post name</label>
           <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
           <label for="">Slug</label>
           <input type="text" name="slug" class="form-control">
        </div>
        <div class="mb-3">
           <label for="">Description</label>
           <textarea type="text" name="description" id="mySummernote" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
           <label for="">Original Price</label>
           <input type="text" name="original_price" class="form-control">
        </div>

        <div class="mb-3">
           <label for="">Selling Price</label>
           <input type="text" name="selling_price" class="form-control">
        </div>

        <div class="mb-3">
           <label for="">Qty</label>
           <input type="text" name="qty" class="form-control">
        </div>

        <div class="mb-3">
           <label for="">Image</label>
           <input type="file" name="image" class="form-control">
        </div>
        
        <h4>SEO Tags</h4>
        <div class="mb-3">
           <label for="">Meta_title</label>
           <input type="text" name="meta_title" class="form-control">
        </div>
        <div class="mb-3">
           <label for="">Meta_description</label>
           <input type="text" name="meta_description" class="form-control">
        </div>
        <div class="mb-3">
           <label for="">Meta_keyword</label>
           <input type="text" name="meta_keyword" class="form-control">
        </div>
        
        
        <h4>Status</h4>
        
           <div class="row">
           <div class= "col-md-3 mb-3">
            <label>Status</label>
            <input type="checkbox" name="status" />
           </div>
           </div>

        <div class="col-md-8">
        <div class="col-3">
            <button type="submit" class="btn btn-success float-end">Save Post </button>
           </div>
           </div>

        </form>
    </div>
</div>
</div>
@endsection
@extends('layouts.master')
@section('title','Category')
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
            <h4>Add Category
                <a href ="{{url('admin/add-category1')}}" class="btn btn-success float-end">Add Category</a>
            </h4>
        </div>
        
       
       <div class="card-body">
          <form action="{{url('admin/add-category')}}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="mb-3">
            <label for="">Category Name</label>
            <input type="text" name="name" class="form-control">
           </div>

           <div class="mb-3">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control">
           </div>

           <div class="mb-3">
            <label for="">Description</label>
            <textarea type="text" name="description" id="mySummernote" class="form-control"></textarea>
           </div>

           <div class="mb-3">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
           </div>

           <h6>SEO Tags</h6>
           <div class="mb-3">
            <label for="">Meta Title</label>
            <input type="text" name="meta_title" class="form-control">
           </div>

           <div class="mb-3">
            <label for="">Meta Description</label>
            <input type="text" name="meta_description" class="form-control">
           </div>

           <div class="mb-3">
            <label for="">Meta Keyword</label>
            <input type="text" name="meta_keyword" class="form-control">
           </div>

           <h6>Status Mode</h6>
           <div class="row">
           <div class= "col-md-3 mb-3">
            <label for="">Navbar Status</label>
            <input type="checkbox" name="navbar_status" />
           </div>
            
           <div class= "col-md-3 mb-3">
            <label >Status</label>
            <input type="checkbox" name="status" />
           </div></div>

           <div class="col-md-6">
            <button type="submit" class="btn btn-success">Save Category</button>
           </div>


          </form>
        </div>
    

</div>
</div>
@endsection
@extends('layouts.master')
@section('title','View Post')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
             
                       
        <div class="card-header">
            <h4>View Posts
                <a href ="{{url('admin/add-post')}}" class="btn btn-success float-end">Add Posts</a>
            </h4>
        </div>
        <div class="card-body">
                 
                       @if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif

                        <div class="table-responsive">
                        <table class="table table-bordered" id="myDataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product Name </th>
                                <th>Image</th>
                                <th>Original Price</th>
                                <th>Selling Price</th>
                                <th>Qty</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post as $item)
                            <tr>
                               <td> {{$item->id}}</td>
                               <td> {{$item->category->name}}</td>
                               <td> {{$item->name}}</td>
                               <td> 
                                <img src="{{ asset('uploads/post/'.$item->image)}}" width="80px" height="50px" alt="img">
                               </td>
                               <td> {{$item->original_price}}</td>
                               <td> {{$item->selling_price}}</td>
                               <td> {{$item->qty}}</td>
                               <td> {{$item->status=='1' ? 'Hidden':'Visible'}}</td>
                               <td>
                                <a href="{{url('admin/edit-post/'.$item->id)}}" class="btn btn-success">Edit</a>
                               </td>

                               <td>
                                <a href="{{url('admin/delete-post/'.$item->id)}}" 
                                onclick = "return confirm('Are you sure you want to delete?');"
                                class="btn btn-danger">Delete</a>
                               </td>

                            </tr>
                            @endforeach
                        </tbody>    

                    </table>
                 
                    
        </div>
    </div>
</div>
@endsection
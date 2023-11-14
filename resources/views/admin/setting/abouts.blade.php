@extends('layouts.master')
@section('title','About Us')
@section('content')

                   @if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif
<div class="row">
    <div class="card mt-4">
          <div class="col-md-12 grid-margin   ">
          <div class="card-header">
            <h4>About Us
            <a href ="{{url('admin/about_add')}}" class="btn btn-success float-end">Add</a>
          
            </h4>
        </div>
        <div class="card-body">

                        <div class="table-responsive">
                        <table class="table table-bordered" id="myDataTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aboutus as $item)
                            <tr>
                               <td> {{$item->id}}</td>
                               <td> {{$item->title}}</td>
                               <td> {{$item->subtitle}}</td>
                               <td> 
                                <img src="{{ asset('uploads/aboutus/'.$item->image)}}" width="80px" height="50px" alt="img">
                               </td>
                               <td> {!!$item->description!!}</td>
                               <td>
                                <a href="{{url('admin/edit-aboutus/'.$item->id)}}" class="btn btn-success">Edit</a>
                               </td>

                               <td>
                                <a href="{{url('admin/delete-aboutus/'.$item->id)}}" 
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
</div>
</div>
                    
@endsection
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
                            <h4>View Category<a href="{{url('admin/add-category1')}}" class="btn btn-success btn-sm float-end">Add Category</a>
                        </h4>
                       </div>

                        <div class="card-body">
                            @if(session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif
                            <div class="table-responsive">
                        <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category </th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $item)
                            <tr>
                               <td> {{$item->id}}</td>
                               <td> {{$item->name}}</td>
                               <td> 
                                <img src="{{ asset('uploads/category/'.$item->image)}}" width="80px" height="50px" alt="img">
                               </td>

                               <td> {{$item->status=='1' ? 'Hidden':'Shown'}}</td>
                               <td>
                                <a href="{{url('admin/edit-category/'.$item->id)}}" class="btn btn-success">Edit</a>
                               </td>
                          
                               <td>
                              <a href="{{url('admin/delete-category/'.$item->id)}}"  
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


@endsection



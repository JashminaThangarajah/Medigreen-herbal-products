@extends('layouts.master')
@section('title','View Users')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
             
                       
        <div class="card-header">
            <h4>View Users </h4>
        </div>
        <div class="card-body">
                 
                       @if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif
                        <div class="table-responsive"><!--It will responsive for the mobile also -->
                        <table  id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Email </th>
                                <th>Address </th>
                                <th>Phone no </th>
                                <th>Role</th> 
                                <th>Edit</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $item)
                            <tr-2>
                               <td> {{$item->id}}</td>
                               <td> {{$item->fname}} {{$item->lname}}</td>
                               <td> {{$item->email}}</td>
                               <td> {{$item->address}}</td>
                               <td> {{$item->phone_no}}</td>
                               <td> {{$item->role_as=='1' ? 'Admin':'User'}}</td>
                               <td>
                                <a href="{{url('admin/user/'.$item->id)}}" class="btn btn-success">Edit</a>
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
    </div>
</div>
@endsection
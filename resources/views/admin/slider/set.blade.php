@extends('layouts.master')
@section('title','Sliders')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">

                       <div class="card-header">
                            <h4>Slider List<a href="{{url('admin/sliders/create')}}" class="btn btn-success btn-sm float-end">
                                Add Slider</a> </h4>
                       </div>

        <div class="card-body">
                 
                       @if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif

                        <div class="table-responsive"><!--It will responsive for the mobile also -->
                        <table  id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th >ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image </th>
                                <th>Status</th>
                                <th>Action</th>            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                         <tr>
                         <td width= 10px> {{$slider->id}}</td>
                         <td width= 20px> {{$slider->title}}</td>
                         <td width= 40px > {!!$slider->description!!}</td>
                         <td width= 10px>  <img src="{{ asset('uploads/slider/'.$slider->image)}}" width="80px" height="50px" alt="slider-img"></td>
                         <td width= 10px> {{$slider->status == '0' ? 'visible':'Hidden'}}</td>
                         <td width= 20px>
                            <a href="{{url('admin/sliders/'.$slider->id.'/edit')}}" class="btn btn-success">Edit</a>
                            <a href="{{url('admin/sliders/'.$slider->id.'/delete')}}"
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
    </div>
</div>
@endsection
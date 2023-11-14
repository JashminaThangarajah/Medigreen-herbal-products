@extends('layouts.app')
@section('title',"My Orders")
@section('content')

<section class="bg-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 py-3">
                <h5><a href="/" class="text-dark">Home</a> › My Order</h5>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            @if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif
                <div class="card-header">
                    <h4>My Orders</h4>
                </div>
                <div class="card-body table-responsive">
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Tracking number</th>
                    <th>Total price</th>
                    <th>Status</th>
                    <th>Action </th>
                  </tr>
               </thead>
               <tbody>
                
                @foreach($orders as $item)
                   <tr>
                    <td>{{$item->tracking_no}}</td>
                    <td>{{$item->total_price}}</td>
                    <td>{{$item->order_status == '0' ? 'pending' : 'completed'}}</td>
                    <td>
                        <a href="{{ url('view-order/'.$item->id)}}" class="btn btn-success">View</a>
                        <a href="{{ url('view-order/'.$item->id)}}" class="btn btn-success">Cancel</a>
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
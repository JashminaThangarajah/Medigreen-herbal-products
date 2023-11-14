@extends('layouts.master')
@section('title','Orders')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
              
              <div class="card-header bg-success">
                    <h4 class="text-white"> Order History
                        <a href="{{url('admin/orders')}}" class="btn btn-warning float-end">New Orders</a>
                    </h4>
                </div>

                <div class="card-body">
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Order Date</th>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>Tracking number</th>
                    <th>Status</th>
                    <th>Action </th>
                  </tr>
               </thead>
               <tbody>
              
                @foreach($orders as $item)
                   <tr>
                   <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                   <td>{{$item->user_id}}</td>
                   <td>{{$item->users->fname}} {{$item->users->lname}}</td>
                    <td>{{$item->tracking_no}}</td>      
                   <!-- <td>{{$item->total_price}}</td>-->
                    <td>
                          @if($item->order_status == '0')
                          Pending
                          @elseif($item->order_status == '1')
                          Completed
                          @elseif($item->order_status == '2')
                          Cancelled
                          @endif
                    <!--    {{$item->order_status == '0' ? 'pending' : 'completed'}}-->

                    </td>
                    <td>
                        <a href="{{ url('admin/view-order/'.$item->id)}}" class="btn btn-success">View</a>
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
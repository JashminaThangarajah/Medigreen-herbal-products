@extends('layouts.app')
@section('title',"New Orders")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Order View</h4>
                    <a href="{{url('admin/invoice/'.$orders->id.'/generate')}}" class="btn btn-info btn-sm"><i class="fa fa-download"></i>Download Invoice</a>
                    <a href="{{url('admin/invoice/'.$orders->id)}}" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-eye"></i>View Invoice</a>
                    <a href="{{url('admin/invoice/'.$orders->id.'/mail')}}" class="btn btn-warning btn-sm" ><i class="fa fa-mail-reply-all"></i>Send Invoice Via Mail</a>

                    <span class="badge bg-danger float-end"><a href="{{url('admin/orders')}}" class="text-white"><i class="fa fa-arrow-left"></i>Back</a></span>  
                </div>
    <ol>
     <div class="card">
     <div class="card-body">
     @if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif
            <ul>
            <div class="row">     

                @php $total="0" @endphp    
                @foreach($orders->orderitems as $item)
                <h4><li>{{$item->products->name}} </li> </h4> 
                 
                <div class="col-md-4">
                <img src="{{ asset('uploads/post/'.$item->products->image)}}" class="rounded mx-auto " width="250px" height="250px" alt="img"> 
                </div>

                <div class="col-md-8">
              
                     <h5> {!!$item->products->description!!}</h5> 
                     <h6> Qty : {{$item->qty}}</h6> 
                     <h6><s> Original Price : Rs {{$item->products->original_price}}</s></h6>
                     <h6> Offer Price : Rs {{$item->products->selling_price}}</h6>
                     @php $total += ($item->qty * $item->products->selling_price); @endphp
                     </div>
                     @endforeach
                     </div>
          
          </ul>
          </div>

           </div>
          </ol>     
     <div class="card-body">
         <div class="col-md-12">
                 <h6> Total_price : Rs {{number_format($total, 2)}}</h6>   
                 <h6> Paid On : {{$orders->payment_method}}</h6>   
                 <!--  <span class="badge rounded-pill bg-success">
                  {{$orders->order_status == '0' ? 'pending' : 'completed'}}
                    </span>
                -->
              <form action="{{url('admin/update-order/'.$orders->id)}}" method="POST">
                @csrf
                @method('PUT')
             <h5>  <select class="form-select-sm badge rounded-pill bg-success float-end" name="order_status"  >
                          <option {{$orders->order_status == '0' ? 'selected':''}} value="0">Pending</option>
                          <option {{$orders->order_status == '1' ? 'selected':''}} value="1">Completed</option>
                          <option {{$orders->order_status == '2' ? 'selected':''}} value="2">Cancelled</option>
                        </select>
                        
                        <button type="submit" class=" badge rounded-pill bg-danger float-end ">Update Status </button>
                        </h5> 
                        </form> 
                          @if($orders->order_status == '2')
                        <h6>Cancelled Reason:{{$orders->cancel_reason }}</h6>
                         @endif
               
               

            <h6> Tracking Number: {{$orders->tracking_no}}</h6>
            </div>     
                </div>


            </div>

                </div>

            </div>
            

        </div>
    </div>
</div>



@endsection
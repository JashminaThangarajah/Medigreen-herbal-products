@extends('layouts.app')
@section('title',"My Orders")
@section('content')

<section class="bg-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 py-3">
                <h5><a href="/" class="text-dark">Home</a> › Order</h5>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>My Order</h4>
                    <span class="badge bg-danger float-end"><a href="{{url('my_order')}}" class="text-white">Back</a></span> 
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
               <h4><li> {{$item->products->name}}  </li> </h4> 
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
                 <h5> Total_price : Rs {{number_format($total, 2)}}</h5>   
                 <h6> Paid On : {{$orders->payment_method}}</h6>   
                 <span class="badge rounded-pill bg-success float-end">
                 @if($orders->order_status == '0')
                          Pending
                          @elseif($orders->order_status == '1')
                          Completed
                          @elseif($orders->order_status == '2')
                          Cancelled
                          @endif
               <!--     {{$orders->order_status == '0' ? 'pending' : 'completed'}}-->
                </span>
    
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
@extends('layouts.app')
@section('title',"Cart")
@section('content')

<section class="bg-success">
    <div class="container">
        <div class="row product-data">
            <div class="col-md-12 mt-2 py-3">
                <h5><a href="/" class="text-dark">Home</a> › Wishlist</h5>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="card-shadow">
        <div class="card-body">
        @if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif
                                <div class="table-responsive">
                                   <div class="col-md-12 text-right mb-3">
                                        <a href="javascript:void(0)" class="clear_wishlist font-weight-bold">Clear Wishlist</a>
                                    </div>

                                    <table class="table table-bordered my-auto  text-center">
                                        <thead>
                                            <tr>
                                            <th class="cart-description table-responsive">Image</th>
                                                <th class="cart-product-name">Product Name</th>
                                                <th class="cart-price">Price</th>
                                                <th class="cart-qty">Quantity</th>
                                                
                                                <th class="cart-romove">Action</th>
                                               
                                            </tr>
                                        </thead>

                 <tbody class="my-auto ">
                 @php $total="0" @endphp            
                   @if($wishlist->count()>0)
                     @foreach ($wishlist as $item)
                     @if(isset($item->products))
                    <tr class="cartpage wishlist-content product-data">
                    <input type="hidden" class="wishlist_id" value="{{$item->id}}" >
                             <td class="cart-image">
                                 <a class="entry-thumbnail" >
                                     <img src="{{asset('uploads/post/'.$item->products->image)}}" width="70px" alt="img">
                                 </a>
                                 </td>
                                 <td class="cart-product-name-info">
                                    <h4 class='cart-product-description'>{{$item->products->name}}</h4>
                                </td>
                                    <td class="cart-product-sub-total">
                                        <span class="cart-sub-total-price">{{ number_format($item->products->selling_price, 2) }}</span>
                                   </td>
                                     
                <input type="hidden" class="product_id" value="{{$item->id}}" > 
                   <td class="cart-product-product-data " width="150px">
                      @if($item->products->qty >= $item->qty)
                      <div class="input-group product-data">
                       <div class="input-group-prepend decrement-btn " style="cursor: pointer">
                        <span class="input-group-text">-</span>
                     </div>
                    <input type="text" class="input-qty form-control" maxlength="2" max="10" value="1">
                   <div class="input-group-append increment-btn " style="cursor: pointer">
                 <span class="input-group-text">+</span>
                 </div>
                 </div>
                        @php $total += ($item->qty * $item->products->selling_price); @endphp
                       
                        @else
                      <h5>Out of Stock</h5>
                     @endif
                    </td>
                            
                    <td style="font-size: 20px;">
                
                            <button type="button" class="btn btn-warning m-0 py-2 px-3 add-to-cart-btn  " >Add To Cart <i class="fa fa-shopping-cart"></i></button>
                           
            
               
                  <button type="button" class="btn btn-danger delete_wishlist_data"><li class="fa fa-trash-o"></li> Delete</button>
               </td>
               
                </tr>
                @endif
                @endforeach
             </tbody>


            </table>
                                  
                             
                               
                                         
                
          
      @else
      <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                            <div class="mycards">
                                <h3>Your <i class="fa fa-heart"></i>Wishlist is currently empty.</h3>
                                <a href="{{ url('/') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
            

       @endif                            
                      
               
        </div> 
         </div>
        </div> 
    </div>
</section>




@endsection
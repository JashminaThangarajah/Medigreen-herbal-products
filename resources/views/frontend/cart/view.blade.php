@extends('layouts.app')
@section('title',"Cart")
@section('content')

<section class="bg-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 py-3">
                <h5><a href="/" class="text-dark">Home</a> › Cart</h5>
            </div>
        </div>
    </div>
</section>
                        @if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
            @if(count($cartItems) > 0)
                  @php $total="0" @endphp
                        <div class="shopping-cart">
                            <div class="shopping-cart-table">
                                <div class="table-responsive">
                                    <div class="col-md-12 text-right mb-3">
                                        <a href="javascript:void(0)" class="clear_cart font-weight-bold">Clear Cart</a>
                                    </div>

                                    <table class="table table-bordered my-auto  text-center">
                                        <thead>
                                            <tr>
                                                <th class="cart-description">Image</th>
                                                <th class="cart-product-name">Product Name</th>
                                                <th class="cart-price">Price</th>
                                                <th class="cart-qty">Quantity</th>
                                                <th class="cart-total">Grandtotal</th>
                                                <th class="cart-romove">Remove</th>
                                            </tr>
                                        </thead>

                 <tbody class="my-auto">
                     @foreach ($cartItems as $item)
                         <tr class="cartpage">
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
                                     
       <input type="hidden" class="product_id" value="{{$item->post_id}}" > 
         <td class="cart-product-product-data " width="150px">
         @if($item->products->qty >= $item->qty)
        <div class="input-group product-data">
            <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                <span class="input-group-text">-</span>
            </div>
            <input type="text" class="input-qty form-control" maxlength="2" max="10" value="{{$item->qty}}">
            <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                <span class="input-group-text">+</span>
            </div>
        </div>
        @php $total += ($item->qty * $item->products->selling_price); @endphp
        @else
        <h5>Out of Stock</h5>
       @endif
    </td>
                            
                <td class="cart-product-grand-total">
                      <span class="cart-grand-total-price">{{ number_format($item->qty * $item->products->selling_price, 2) }}</span>
                 </td>
               <td style="font-size: 20px;">
                  <button type="button" class="btn btn-danger delete_cart_data"><li class="fa fa-trash-o"></li> Delete</button>
               </td>
               
                </tr>
                @endforeach
             </tbody>


                                </table>
                                  
                                </div>
                            </div><!--shopping-cart-table -->

                            <div class="row">

                                <div class="col-md-8 col-sm-12 estimate-ship-tax">
                                    <div>
                                        <a  href="{{url('/')}}" class="btn btn-upper btn-warning outer-left-xs">Continue Shopping</a>
                                    </div>
                                </div>
                               

                                <div class="col-md-4 col-sm-12 ">
                                    <div class="cart-shopping-total">
                                    <div id ="totalajexcall">
                                        <div class="totalpricingload">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="cart-subtotal-name">Subtotal</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="cart-subtotal-price">
                                                    Rs.
                                                    <span class="cart-grand-price-viewajax">{{ number_format($total, 2) }}</span>
                                                </h6>
                                            </div>
                                        
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="cart-grand-name">Grand Total</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="cart-grand-price">
                                                    Rs.
                                                    <span class="cart-grand-price-viewajax">{{ number_format($total, 2) }}</span>
                                                </h6>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="cart-checkout-btn text-center">
                                                    @if (Auth::user())
                                                        <a href="{{ url('checkout') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>
                                                    @else
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-success btn-block checkout-btn">
                                                            PROCCED TO CHECKOUT
                                                        </a>
                                                        <!-- used pop modal for making a login -->
                                                    @endif
                                                    <h6 class="mt-3"><strong>Checkout with Medigreen</strong></h6>
                                                   <h6 class="mt-3"> </small>(No Return Applicable)<small></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.shopping-cart -->
                      
               
                        @else
                    <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                            <div class="mycards">
                                <h3>Your <i class="fa fa-shopping-cart"></i>cart is currently empty.</h3>
                                <a href="{{ url('/') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                    @endif

            </div>
        </div> 
    </div>
</section>




@endsection
@extends('layouts.app')
@section('title',"Checkout")
@section('content')

<section class="bg-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 py-3">
                <h5><a href="/" class="text-dark">Home</a> › Checkout</h5>
            </div>
        </div>
    </div>
</section>

@if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif
<section class="py-5">
    <div class="container">
        <div class="row">
           <div class="col-md-7">
    <form action="{{url('placeorder')}}" method="POST">
        @csrf
    <h4>Shipping Details</h4>
    <hr>
           <div class="row">
           <div class="col-md-6">
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" name="fname" class="form-control" value="{{Auth::user()->fname}}" placeholder="First Name">
            </div>
           </div>
           <div class="col-md-6">
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" name="lname" class="form-control" value="{{Auth::user()->lname}}" placeholder="Last Name">
            </div>
           </div>
        </div>   

           <div class="row">
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Email">
            </div>
           </div>

           <div class="row">
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" value="{{Auth::user()->address}}" placeholder="Delivery address">
            </div>
           </div>

           <div class="row">
           <div class="col-md-6">
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="phone_no" class="form-control" value="{{Auth::user()->phone_no}}" placeholder="Phone Number">
            </div>
           </div>  
           <div class="col-md-6">
            <div class="form-group">
                <label for="">Zipcode</label>
                <input type="text" name="zipcode" class="form-control" value="{{Auth::user()->zipcode}}" placeholder="Zipcode">
            </div>
           </div> 
         </div>    
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label for="">District</label>
        <select name="district" class="form-select" aria-label="Default select example"> 
              <option value="Jaffna">Jaffna</option>
              <option value="Kilinochchi">Kilinochchi</option>
              <option value="Mullaitive">Mullaitive</option>
              <option value="Vavuniya">Vavuniya</option>
              <option value="Mannar">Mannar</option>
              <option value="Colombo">Colombo</option>
              <option value="Gampaha">Gampaha</option>
              <option value="Kalutara">Kalutara</option>
              <option value="Kandy">Kandy</option>
              <option value="Matale">Matale</option>
              <option value="Nuwara Eliya">Nuwara Eliya</option>
              <option value="Galle">Galle</option>
              <option value="Matara">Matara</option>
              <option value="Hambantota">Hambantota</option>
              <option value="Batticaloa">Batticaloa</option>
              <option value="Ampara">Ampara</option>
              <option value="Trincomalee">Trincomalee</option>
              <option value="Kurunegala">Kurunegala</option>
              <option value="Puttalam">Puttalam</option>
              <option value="Anuradhapura">Anuradhapura</option>
              <option value="Polannaruwa">Polannaruwa</option>
              <option value="Badulla">Badulla</option>
              <option value="Moneragala">Moneragala</option>
              <option value="Ratnapura">Ratnapura</option>
              <option value="Kegalle">Kegalle</option>
         </select>
         </div>
        </div>
      <div class="col-md-6">
        <div class="form-group">
        <label for="">Province</label>
        <select name="province" class="form-select" aria-label="Default select example"> 
              <option value="Nothern">Nothern</option>
              <option value="North Central">North Central</option>
              <option value="North Western">North Western</option>
              <option value="Eastern">Eastern</option>
              <option value="Central">Central</option>
              <option value="Western">Western</option>
              <option value="Uva">Uva</option>
              <option value="Sabragamuwa">Sabragamuwa</option>
              <option value="Southern">Southern</option>
         </select>
         </div>
        </div>
        </div>
          
    </div>
             <div class="col-md-5 table-responsive">
             @if(count($cartItems) > 0)
                     @php $total="0" @endphp
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($cartItems as $item)

                                <tr>
                                    <td>{{ $item->products->name }}</td>
                                    <td>Rs {{ number_format($item->products->selling_price, 2) }}</td>
                                    <td>{{$item->qty}} </td>
                                    @php $total += ($item->qty * $item->products->selling_price); @endphp
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="text-right">
                            <h5>Grand Total = Rs {{number_format($total, 2)}}</h5>
                        </div>
                     
                    @else
                    <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                            <div class="mycards">
                                <h4>Your cart is currently empty.</h4>
                                <a href="{{ url('/') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                    @endif
            </div>
            <br>
           <div class="col-md-12">
            <br>
           <a href="{{ url('cart') }}" class="btn btn-danger btn-block">Back</a>
             <button type="submit" name="place_order_btn" class="btn btn-success me-3m  float-end" >PLACE ORDER </button>
           </div>

            </form>
        </div>
     </div>
</div>
</section>
@endsection
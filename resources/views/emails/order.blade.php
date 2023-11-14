<html>
    <head>

    </head>
    <body>
        <h4> Welcome To Medigreen Herbals. Thanks for Purchasing .</h4>
    
        <h4>First Name:{{ $order_data['fname'] }}</h4>
        <h4>Last Name:{{ $order_data['lname'] }}</h4>
        <h4>Phone No:{{ $order_data['phone_no'] }}</h4>
        <h4>Address:{{ $order_data['address'] }}</h4>
        <h4>Email:{{ $order_data['email'] }}</h4>

        <table cellpadding = "1" cellspacing = "1" border="1" >
           <thead>
             <tr>
                <th>Product Name</th>
                <th>Qty </th>
                <th>Price </th>
             </tr>
           </thead>
           <tbody>
            @php $total="0" @endphp
           @foreach ($cartItems as $data)

<tr>
    <td>{{ $data->products->name }}</td>
    <td>Rs {{ number_format($data->products->selling_price, 2) }}</td>
    <td>{{$data->qty}} </td>
    @php $total += ($data->qty * $data->products->selling_price); @endphp
</tr>
@endforeach

                        <tr>
                            <td colspan="2"><h5>Grand Total:</h5></td>
                            <td>Rs {{number_format($total, 2)}}</td>
                        </tr>
                            
                        
           </tbody>
        </table>
    </body>
</html>
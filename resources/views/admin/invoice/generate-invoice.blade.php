<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #{{$orders->id}}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Medigreen Herbals</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{$orders->id}}</span> <br>
                    <span>Date:{{date('d/m/Y')}}</span> <br>
                    <span>Email:medigreenherbals3@gmail.com</span> <br>
                    <span>Address: Ward No 06,Velanai,Jaffna,Srilanka.</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th> 
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr >
                <td  width="15%" colspan="1">Order Id:</td>
                <td  width="35%" colspan="1">{{$orders->id}}</td>

                <td width="15%" colspan="1">Full Name:</td>
                <td width="35%" colspan="1">{{$orders->users->fname}} {{$orders->users->lname}}</td>
            </tr>
        
            <tr>
                <td width="15%" colspan="1">Tracking Id/No:</td>
                <td width="35%" colspan="1">{{$orders->tracking_no}}</td>

                <td  width="15%" colspan="1">Email:</td>
                <td  width="35%" colspan="1">{{$orders->users->email}}</td>

            </tr>
            <tr>
                <td width="15%" colspan="1">Ordered Date:</td>
                <td width="35%" colspan="1">{{$orders->created_at->format('d-m-Y:i A')}}</td>

                <td width="15%" colspan="1">Phone:</td>
                <td colspan="2">{{$orders->users->phone_no}}</td>
            </tr>
            <tr>
                <td width="15%" colspan="1">Payment Mode:</td>
                <td width="35%" colspan="1">{{$orders->payment_method}}</td>

                <td width="15%" colspan="1">Address:</td>
                <td width="35%" colspan="1">{{$orders->users->address}}</td>
              
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                     <th>Product</th>
                    <!-- <th>Image</th> -->
                    <th>Quantity </th>
                    <th> Price</th>
                    <th> Total Price</th>
            </tr>
        </thead>
        <tbody>
        @php $total="0" @endphp    
                @foreach($orders->orderitems as $item)
              <tr>
                <td width="25%" class="fw-bold">{{$item->products->name}}</td> 
                 
              <!-- <td>
                <img src="{{ asset('uploads/post/'.$item->products->image)}}" class="rounded mx-auto " width="50px" height="50px" alt="img"> 
                </td> -->
              <td width="25%" class="fw-bold">{{$item->qty}}</td>
              <td width="25%" class="fw-bold">Rs {{$item->products->selling_price}}</td>
              @php $total += ($item->qty * $item->products->selling_price); @endphp
              <td width="25%" class="fw-bold">Rs {{number_format($total, 2)}}</td>
              </tr>
            
          @endforeach
          <tr>
          <td colspan="3" class="total-heading">Total Price:</td>
          <td colspan="1" class="total-heading">Rs {{number_format($total, 2)}}</td>
          </tr>
          
         
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping with Medigreen Herbals(PVT).
    </p>

</body>
</html>
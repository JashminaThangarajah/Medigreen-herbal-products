<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Order;
use App\Models\Orderitem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use App\Mail\InvoiceOrderMailable;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    

    public function edit($user_id){
        $user = User::find($user_id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, $user_id){
        $user = User::find($user_id);
        if($user){
            $user->role_as = $request->role_as;
            $user->update();
            return redirect('admin/users')->with('message','Role Updated Successfully');
        }

       return redirect('admin/users')->with('message','No User Found');
    }

//order management
    public function order(){
        $orders = Order::where('order_status','0')->get();
        return view('admin.orders.view',compact('orders'));
    }

    public function view($order_id){
        
        $orders = Order::where('id',$order_id)->first();
        return view('admin.orders.orderview',compact('orders'));
    }

    public function statusupdate(Request $request, $order_id){
        
        $orders = Order::find($order_id);
            $orders->order_status = $request->order_status;
            $orders->update();
            return redirect('admin/orders')->with('message','Status Updated Successfully');
       
    }
    public function orderhistory(){
        $orders = Order::where('order_status','1')->get();
        return view('admin.orders.history',compact('orders'));
    }

    //Invoice for orders
    public function viewInvoice(int $order_id){
        $orders = Order::findOrFail($order_id);
        return view('admin.invoice.generate-invoice',compact('orders'));
    }

    
    public function generateInvoice(int $order_id){
        $orders = Order::findOrFail($order_id);
        $data = ['orders' => $orders];

        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-'.$orders->id.'-'.$todayDate.'.pdf');
    }

    
    public function mailinvoice(int $order_id){
       
        try{
            $orders = Order::findOrFail($order_id);
            Mail::to($orders->users->email)->send(new InvoiceOrderMailable( $orders));
            return redirect('admin/view-order/'.$order_id)->with('message','Invoice Mail has been sent to '.$orders->users->email);
        }
        catch(\Exception $e){
            return redirect('admin/view-order/'.$order_id)->with('message','Something went to Wrong!');
        }
    }

}

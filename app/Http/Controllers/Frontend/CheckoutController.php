<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
   /*   public function checkout(){
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view('frontend.product.checkout')->with('cart_data',$cart_data);
    }
*/
  public function checkout(){
      $old_cartItems = Cart::where('user_id',Auth::id())->get();
      foreach($old_cartItems as $item)
      {
        if(!POST::where('id',$item->post_id)->where('qty','>=',$item->qty)->exists())
        {
            $removeItem = Cart::where('user_id',Auth::id())->where('post_id',$item->post_id)->first();
            $removeItem->delete();
       }
        }
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.product.checkout',compact('cartItems'));
   
    }


    public function thankyou(){
        return view('frontend.product.thankyou');
    }


   /* public function store(Request $request){ //isset use for btn is click only place order happens
       if(isset($_POST['place_order_btn']))
       {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone_no = $request->input('phone_no');
        $user->zipcode = $request->input('zipcode');
        $user->district = $request->input('district');
        $user->province = $request->input('province');
        $user->save();

         //place order
         //payment status = 0(pending) , 1(cash accepted) , 2(cancelled) , 3(continue for online)

         $trackno=rand(1111,9999);
         $order = new Order;
         $order->user_id = $user_id;
         $order->tracking_no = 'medigreen'.$trackno;
         $order->payment_method = "Cash on Delivery";
         $order->payment_status = "0";
         $order->order_status = "0";
         $order->notify = "0";
         $order->save();
         $last_order_id = $order->id;

       //ordered cart items
       $cookie_data = stripslashes(Cookie::get('shopping_cart'));
       $cart_data = json_decode($cookie_data, true);
       $items_in_cart = $cart_data;

       foreach($items_in_cart as $itemdata)
       {
        $post=Post::find($itemdata['item_id']);
        $pric_value = $post->selling_price;
             Orderitem::create([
                'order_id' => $last_order_id,
                'post_id' =>$itemdata['item_id'],
                'price'=>$pric_value,
                'qty'=>$itemdata['item_qty'],
                

             ]);
             $post = Post::where('id',$itemdata['item_id'])->first();
             $post->qty =  $post->qty - $itemdata['item_qty'];
             $post->update();
       }
       Cookie::queue(Cookie::forget('shopping_cart'));
           return redirect('/thank_you')->with('status','Order has been placed successfully');
       }
        
    }*/
    private function placeOrderMailable( $request)
    {
        $order_data = [
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'phone_no' => $request->input('phone_no'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
           
           
        ];
        $cartItems = Cart::where('user_id',Auth::id())->get();
       $to_customer_email = $request->input('email');
        Mail::to($to_customer_email)->send(new placeOrderMailable($order_data,$cartItems));
        return redirect()->back()->with('message','Thank you for contact us. We will get back to asap.!');
    }

    public function store(Request $request)
    { 
        if(isset($_POST['place_order_btn']))
       {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone_no = $request->input('phone_no');
        $user->zipcode = $request->input('zipcode');
        $user->district = $request->input('district');
        $user->province = $request->input('province');
        $user->save();

         //place order
         
         //payment status = 0(pending) , 1(cash accepted) , 2(cancelled) , 3(continue for online)

         $trackno=rand(1111,9999);
         $order = new Order;
         $order->user_id = $user_id;
         $order->tracking_no = 'medigreen'.$trackno;
         $order->payment_method = "Cash on Delivery";
         $order->payment_status = "0";
         $order->order_status = "0";
         $order->notify = "0";
        $trackingno = $order->tracking_no;

         //To calculate the total price
         $total=0;
         $cartItems_total = Cart::where('user_id',Auth::id())->get();
         foreach($cartItems_total as $prod)
          {
            $total+= ($prod->products->selling_price * $prod->qty);
          }
          $order->total_price = $total;

          $order->save();
          $last_order_id = $order->id;

          //place order
        
          //payment status = 0(pending) , 1(cash accepted) , 2(cancelled) , 3(continue for online)
          
          $cartItems = Cart::where('user_id',Auth::id())->get();
          foreach($cartItems as $item)
          {
            Orderitem::create([
                    'order_id' => $last_order_id,
                    'post_id' =>$item->post_id,
                    'price'=>$item->products->selling_price,
                    'qty'=>$item->qty,     
            ]);
            $post = Post::where('id',$item->post_id)->first();
             $post->qty =  $post->qty - $item->qty;
             $post->update();
          }

          $this->PlaceOrderMailable($request);
          $cartItems = Cart::where('user_id',Auth::id())->get();
          Cart::destroy($cartItems);
          return redirect('/my_order')->with('message','Order has been placed successfully');

          
 
        } 
 
         
     
}
}
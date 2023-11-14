<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
/*
   public function index(){
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view('frontend.cart.index')
           ->with('cart_data',$cart_data)
       ;
    }

    public function addtocart(Request $request){

        $post_id = $request->input('post_id');
        $qty = $request->input('qty');

      if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $post_id_is_there = $post_id;

        if(in_array($post_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $post_id)
                {
                    $cart_data[$keys]["item_qty"] = $request->input('qty');
                    $item_data = json_encode($cart_data);
                    $hours = 24;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $hours));
                    return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart']);
                }
            }
        }
        else
        { 
            $posts = Post::find($post_id);
            $name = $posts->name;
            $image = $posts->image;
            $selling_price = $posts->selling_price;

            if($posts)
            {
                $item_array = array(
                    'item_id' => $post_id,
                    'item_name' => $name,
                    'item_qty' => $qty,
                    'item_price' => $selling_price,
                    'item_image' => $image
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);
                $hours = 24;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $hours));
                return response()->json(['status'=>'"'.$name.'" Added to Cart']);
            
            }
        }
    }


    public function cartloadbyajax()
    {
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
        else
        {
            $totalcart = "0";
            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
    }



//update cart
    public function updatetocart(Request $request)
    {
        $post_id = $request->input('post_id');
        $qty = $request->input('qty');


        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data, 'item_id');
            $prod_id_is_there = $post_id;

            if(in_array($prod_id_is_there, $item_id_list))
            {
                foreach($cart_data as $keys => $values)
                {
                    if($cart_data[$keys]["item_id"] == $post_id)
                    {
                        $cart_data[$keys]["item_qty"] =  $qty;
                       $gtprice = ($cart_data[$keys]["item_price"] * $qty);
                        $grandtotalprice =  number_format($gtprice);
                       $item_data = json_encode($cart_data);
                        $hours = 24;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $hours));
                        return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Quantity Updated',
                    'gtprice' =>''.$grandtotalprice.''
                    ]);
                    }
                }
            }
        }   
    }


    //delete from cart
    public function deletefromcart(Request $request)
    {
        $post_id = $request->input('post_id');

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $post_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $post_id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $hours = 24;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $hours));
                    return response()->json(['status'=>'Item Removed from Cart']);
                }
            }
        }
    }

//clear cart

    public function clearcart()
    {
        Cookie::queue(Cookie::forget('shopping_cart'));
        return response()->json(['status'=>'Your Cart is Cleared']);
    }
*/
    

//Cart using table or model

public function addtocart(Request $request)
{

    $post_id = $request->input('post_id');
    $qty = $request->input('qty');

  if(Auth::check())
    {
         $prod_check = Post::where('id',$post_id)->first();
         if( $prod_check )
         {
           if(Cart::where('post_id',$post_id)->where('user_id',Auth::id())->exists()){

            return response()->json(['status'=> $prod_check->name." Already Added to Cart"]);
           }
           else{
            $cartItem = new Cart();
            $cartItem ->post_id = $post_id;
            $cartItem ->user_id = Auth::id();
            $cartItem ->qty = $qty;
            $cartItem->save();
            return response()->json(['status'=> $prod_check->name." Added to Cart"]);
           }
          
         }
    }
    else
    {
      return response()->json(['status'=>"Login to Continue"]) ;
        
    }       
}

//view cart 
public function viewcart(){
    $cartItems = Cart::where('user_id',Auth::id())->get();
    return view('frontend.cart.view',compact('cartItems')) ;
}

//delete from cart
public function deletefromcart(Request $request)
{
    if(Auth::check())
    {
        $post_id = $request->input('post_id');
        if(Cart::where('post_id',$post_id)->where('user_id',Auth::id())->exists()){

           $cartItem = Cart::where('post_id',$post_id)->where('user_id',Auth::id())->first();
           $cartItem ->delete();
           return response()->json(['status'=>"Item removed from cart"]) ;
           }
    }
    else{
        return response()->json(['status'=>"Login to Continue"]) ;
    }
   
}

//update cart qty and grand total
public function updatetocart(Request $request)
    {
        $post_id = $request->input('post_id');
        $post_qty = $request->input('qty');


        if(Auth::check())
        {
            if(Cart::where('post_id',$post_id)->where('user_id',Auth::id())->exists()){
            $cart = Cart::where('post_id',$post_id)->where('user_id',Auth::id())->first();
            $cart->qty = $post_qty;
            $cart->update();
            return response()->json(['status'=>"Quantity Updated"]) ;

            }         
        }   
    }

    //clear cart
    public function clearCart()
    {   
        Cart::truncate();
    }
//cardload in nav bar
   /* public function cartcount()
    {   
            $carttotal = Cart::sum('qty'); // Adjust this based on your cart table model and column name

            return response()->json(['count' => $carttotal]);     
       
    }*/

    public function cartcount()
    {   
            $cartcount = Cart::where('user_id',Auth::id())->count(); 

            return response()->json(['count' => $cartcount]);     
       
    }


}
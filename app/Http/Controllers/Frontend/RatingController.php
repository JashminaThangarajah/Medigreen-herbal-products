<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Post;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    //
    public function rate(Request $request)
    { 
       $stars_rated = $request->input('product_rating');
       $post_id =  $request->input('product_id');
       $product_check = Post::where('id',$post_id)->where('status','0')->first();
       if($product_check)
       {
           $verified_purchase = Order::where('orders.user_id',Auth::id())
           ->join('order_items','orders.id','order_items.order_id')
           ->where('order_items.post_id', $post_id)->get();

           if($verified_purchase -> count()>0)
           {
             $existing_rating = Rating::where('user_id', Auth::id())->where('post_id',$post_id)->first();
            if($existing_rating)
            {
                $existing_rating->stars_rated = $stars_rated;
                $existing_rating->update();
            }
            else{
                Rating::create ([
                    'user_id'=>Auth::id(),
                    'post_id'=>$post_id,
                    'stars_rated'=>$stars_rated,
                   ]);
            }
              return \redirect()->back()->with('message',"Thankyou for Rating"); 
            
           }
           else
           {
            return redirect()->back()->with('message',"You cannot rate without purchase");
           }
       }
       else
        {
            return redirect()->back()->with('message',"The link you followed was broken");
        }
    }
}

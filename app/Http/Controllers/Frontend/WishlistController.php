<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function view(){
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
         return view('frontend.wishlist.wish',compact('wishlist'));
     }


    

public function addwishlist(Request $request){
    $post_id = $request->post_id;
      if(Wishlist::where('user_id',Auth::id())->where('post_id',$post_id)->exists())
      {
        return response()->json(['status'=>"Product is already Added to Wishlist"]) ;

     }
        else{
            $wish = new Wishlist();
            $wish->user_id = Auth::id();
            $wish->post_id = $post_id;
            $wish->save();
            return response()->json(['status'=>"Product is Added to Wishlist"]) ;
        }    
    }

 //delete wishlist
public function delete(Request $request)
{
    if(Auth::check())
    {
        $wishlist_id = $request->wishlist_id;
        if(Wishlist::where('id',$wishlist_id)->where('user_id',Auth::id())->exists()){

           $wish = Wishlist::where('id',$wishlist_id)->where('user_id',Auth::id())->first();
           $wish ->delete();
           return response()->json(['status'=>"Item removed from wishlist"]) ;
           }
    }
    else{
        return response()->json(['status'=>"No item found in Wishlist"]) ;
    }
   
}

public function clearwishlist()
{   
    Wishlist::truncate();
}

public function wishlistcount()
    {   
            $wishcount = Wishlist::where('user_id',Auth::id())->count(); 

            return response()->json(['count' => $wishcount]);     
       
    }


}

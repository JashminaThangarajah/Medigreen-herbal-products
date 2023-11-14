<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Order;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    public function review($post_slug){
        $post = Post::where('slug',$post_slug)->where('status','0')->first();

       if($post)
       {
        $post_id = $post->id;
        $review = Review::where('user_id',Auth::id())->where('post_id',$post_id)->first();
        if($review)
        {
            return view('frontend.reviews.edit',compact('review'));
           }
           else
           {
            
            $verified_purchase = Order::where('orders.user_id',Auth::id())
             ->join('order_items','orders.id','order_items.order_id')
             ->where('order_items.post_id', $post_id)->get();
             return view('frontend.reviews.review',compact('post','verified_purchase'));
           }
        }
        else
        {
         return redirect()->back()->with('message',"The link you followed was broken");
        }
       
       
    }
    
    public function create(Request $request)
     {
        
      
        // $post = new Review();
        // $post->user_id =Auth::id();
        // $post->post_id = $request->input('post_id');
        // $post->user_review = $request->input('user_review');
        // $post->save();
        // return redirect()->back()->with('message',"Thank you for writing a review");
      

        
        $post_id =  $request->input('post_id');
        $post = Post::where('id',$post_id)->where('status','0')->first();
        if($post)
        {
           $user_review = $request->input('user_review');
           $new_review = Review::create([
            'user_id'=>Auth::id(),
            'post_id'=> $post_id,
            'user_review'=> $user_review,
           ]);
               $category_slug = $post->category->slug;
               $post_slug = $post->slug;
               if($new_review){
                return redirect('product/'.$category_slug.'/'.$post_slug)->with('message',"Thank you for writing a review");
               }
       }
       else
            {
                return redirect()->back()->with('message',"The link you followed was broken");
             }
       
     }

     
     public function edit($post_slug)
     {
        $post = Post::where('slug',$post_slug)->where('status','0')->first();
        if($post)
        {
            $post_id = $post->id;
            $review = Review::where('user_id',Auth::id())->where('post_id',$post_id)->first();
            if($review)
            {
               return view('frontend.reviews.edit',compact('review'));
            }
            else
            {
                return redirect()->back()->with('message',"The link you followed was broken");
            }
        }
        else
        {
            return redirect()->back()->with('message',"The link you followed was broken");
        }
     }


     public function update(Request $request){
        $user_review = $request->input('user_review');
        if($user_review != '')
        {
            $review_id = $request->input('review_id');
            $review = Review::where('id',$review_id)->where('user_id',Auth::id())->first();
            if($review){
                $review->user_review = $request->input('user_review');
                $review->update();
                return redirect()->back()->with('message','Review Updated Successfully');
            }
            else
            {
                return redirect()->back()->with('message',"The link you followed was broken");
            }
        }
        else
        {
            return redirect()->back()->with('message',"You cannot submit an empty review");
        }
       
       
       
   }

//    public function update(Request $request,$post_id){
//     $review = Review::find($post_id);
    
              
//                 $review->user_review = $request->input('user_review');
//                 $review->update();
//                 return redirect()->back()->with('message',"Review Updated");

// }

}

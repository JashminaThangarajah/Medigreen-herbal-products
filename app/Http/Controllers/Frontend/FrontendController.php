<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Category;
use App\Models\Post;
use App\Models\Rating;
use App\Models\Slider;
use App\Models\Aboutus;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::where('status','0')->get();
        $all_categories= Category::where('status','0')->get();
        return view('frontend.index',compact('all_categories','sliders'));
    }

    public function aboutus(){
       $about_s1 = Aboutus::find('1');
        return view('frontend.aboutus',compact('about_s1'));
    }


    
    
//search bar

public function  searchproduct(Request $request )
   {
   
     if($request->search)
    {
        $category = Category::where('status','0')->get();
       
            $searchproducts = Post::where('name','LIKE','%'.$request->search.'%')->get();
            return view('frontend.pages.search',compact('searchproducts','category'));

   }
   else
        {
          return redirect()->back()->with('message','Empty Search');
         }
   }

   //view category
    public function  viewCategoryPost($category_slug){
        $category = Category::where('slug',$category_slug)->where('status','0')->first();
        if($category){
            $post = Post::where('category_id', $category ->id)->where('status','0')->paginate(4);//it will show 1 data in front page
            return view('frontend.post.index',compact('post','category'));
        }
        else{
            return redirect('/');
        }
       
    }

//view product
    public function   viewPost(string $category_slug,string $post_slug){
        $category = Category::where('slug',$category_slug)->where('status','0')->first();  //0-visible
        if($category){
            $post = Post::where('category_id', $category ->id)->where('slug',$post_slug)->where('status','0')->first();
         $ratings = Rating::where('post_id',$post->id)->get();
         $rating_sum = Rating::where('post_id',$post->id)->sum('stars_rated');
         $user_rating = Rating::where('post_id',$post->id)->where('user_id',Auth::id())->first();
         $reviews = Review::where('post_id',$post->id)->get();

         if($ratings->count() > 0){
            $rating_value = $rating_sum/$ratings->count();
         }
         else{
            $rating_value = 0;
         }
        
            //it will show the 10 latest posts take(10)  
            $latest_posts =Post::where('category_id', $category ->id)->where('status','0')->orderBy('created_at','DESC')->get()->take(10);
            return view('frontend.post.view',compact('post','latest_posts','ratings','rating_value','user_rating','reviews'));
        }
        else{
            return redirect('/');
        }
       
    }
    
}

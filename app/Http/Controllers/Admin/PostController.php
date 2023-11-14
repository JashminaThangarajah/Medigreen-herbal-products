<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $post=Post::all();
        return view('admin.post.index',compact('post'));
    }

    
    

    public function create()
    {
        $category = Category::where('status','0')->get();
         return view('admin.post.create',compact('category'));
     }


     public function store(Request $request){
        $post = new Post();

        $post->category_id = $request->input('category_id');
        $post->name = $request->input('name');
        $post->slug = Str::slug($request->slug); 
        $post->description = $request->input('description');
        $post->original_price = $request->input('original_price');
        $post->selling_price = $request->input('selling_price');
        $post->qty = $request->input('qty');

        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename= time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/',$filename);
            $post->image = $filename;
        }

        $post->meta_title = $request->input('meta_title');
        $post->meta_description = $request->input('meta_description');
        $post-> meta_keyword = $request->input('meta_keyword');

        $post->status = $request->input('status') == true ? '1':'0';
       
        $post->save();
        return redirect('admin/posts')->with('message','Post Added Successfully');
    }


     public function edit($post_id)
     {
        $category = Category::where('status','0')->get();
        $post = Post::find($post_id);
         return view('admin.post.edit',compact('post','category'));
     }

     public function update(Request $request,$post_id){
        $post = Post::find($post_id);
        $post->category_id = $request->input('category_id');
        $post->name = $request->input('name');
        $post->slug =Str::slug($request->slug); 
        $post->description = $request->input('description');
        $post->original_price = $request->input('original_price');
        $post->selling_price = $request->input('selling_price');
        $post->qty = $request->input('qty');

        if($request->hasfile('image')){
            $destination = 'uploads/post/'.$post->image;
            if(File::exists($destination )){
                File::delete($destination );
            }
            $file = $request->file('image');
            $filename= time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/',$filename);
            $post->image = $filename;
        }

        $post->meta_title = $request->input('meta_title');
        $post->meta_description = $request->input('meta_description');
        $post-> meta_keyword = $request->input('meta_keyword');

        $post->status = $request->input('status') == true ? '1':'0';
       
        $post->update();
        return redirect('admin/posts')->with('message','Post Updated Successfully');
    }



    

    public function destroy($post_id)
    {
        $post= Post::find($post_id);  
        $destination = 'uploads/post/'.$post->image;
            if(File::exists($destination ))
            {
                File::delete($destination );
            }
        $post->delete();
        return redirect('admin/posts')->with('message','Post deleted successfully');
    }
    
    

}

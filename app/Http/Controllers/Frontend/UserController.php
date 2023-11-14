<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use App\Models\Orderitem;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function myprofile(){
       
        return view('frontend.profile');
    }

    public function profileupdate(Request $request){
      $user_id = Auth::user()->id;
      $user = User::findOrFail($user_id);
      $user->fname=$request->input('fname');
        $user->lname=$request->input('lname');
         $user->phone_no=$request->input('phone_no');
        $user->gender=$request->input('gender');
        $user->zipcode=$request->input('zipcode');
        $user->address=$request->input('address');
        $user->district=$request->input('district');
        $user->province=$request->input('province');

   

        if($request->hasfile('image')){
            $destination = 'uploads/profile/'.$user->image;
            if(File::exists($destination )){
                File::delete($destination );
            }
            $file = $request->file('image');
            $filename= time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/profile/',$filename);
            $user->image = $filename;
        }
        $user->update();
        return redirect()->back()->with('status','Profile Updated');

    }

    public function order(){
       $orders = Order::where('user_id',Auth::id())->get();
        return view('frontend.product.myorder',compact('orders'));
    }

    public function orderview($id){
        $orders = Order::where('id',$id)->where('user_id',Auth::id())->first();
         return view('frontend.product.view',compact('orders'));
     }

     //change password
     public function  changepassword(){
       
        return view('frontend.changepassword');
    }
    
    public function newpassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password Updated Successfully');

        }else{

            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }
    }

    
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactus(){
       $contactus = Setting::first();
        return view('frontend.contactus',compact('contactus'));
    }

    public function ContactMailable(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
           'phone_no' => $request->phone_no,
            'msg' => $request->msg,
        
           
           
        ];
        Mail::to('medigreenherbals3@gmail.com')->send(new ContactMailable($details));
        return redirect()->back()->with('message','Message has been sent successfully');
    }

}

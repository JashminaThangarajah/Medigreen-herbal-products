<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Aboutus;
use Illuminate\Support\Facades\File;
class SettingController extends Controller
{
    //site settings
    public function settings(){
        $setting = Setting::first();
        return view('admin.setting.set',compact('setting'));
    }


    public function store(Request $request){
        $setting = Setting::first();
            if($setting){
       $setting->update([
        'website_name'=>$request->website_name,
        'website_url'=>$request->website_url,
        'title'=>$request->title,
        'meta_keywords'=>$request->meta_keywords,
        'meta_description'=>$request->meta_description,

        'address'=>$request->address,
        'phone1'=>$request->phone1,
        'phone2'=>$request->phone2,
        'email1'=>$request->email1,
        'email2'=>$request->email2,

        'facebook'=>$request->facebook,
        'twitter'=>$request->twitter,
        'instagram'=>$request->instagram,
        'youtube'=>$request->youtube,
       ]);
       return redirect()->back()->with('message','Settings Updated Successfully');
        }
            else{
                Setting::create([
                    'website_name'=>$request->website_name,
                    'website_url'=>$request->website_url,
                    'title'=>$request->title,
                    'meta_keywords'=>$request->meta_keywords,
                    'meta_description'=>$request->meta_description,
        
                    'address'=>$request->address,
                    'phone1'=>$request->phone1,
                    'phone2'=>$request->phone2,
                    'email1'=>$request->email1,
                    'email2'=>$request->email2,
        
                    'facebook'=>$request->facebook,
                    'twitter'=>$request->twitter,
                    'instagram'=>$request->instagram,
                    'youtube'=>$request->youtube,
                ]);
                return redirect()->back()->with('message','Settings Saved Successfully');
            }
      
    }


    //aboutus
    public function aboutus(){
        $aboutus = Aboutus::all();
        return view('admin.setting.abouts',compact('aboutus'));
    }
    public function about_add(){
        return view('admin.setting.addaboutus');
    }

    

    public function abouts_save(Request $request){

        $aboutus = new Aboutus;
        $aboutus-> title = $request->input('title');
        $aboutus-> subtitle = $request->input('subtitle');
        if($request->hasfile('image')){
            $destination = 'uploads/aboutus/'.$aboutus->image;
            if(File::exists($destination )){
                File::delete($destination );
            }
            $file = $request->file('image');
            $filename= time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/aboutus/',$filename);
            $aboutus->image = $filename;
        }
        $aboutus-> description = $request->input('description');
        $aboutus->save();
        return redirect('admin/aboutus')->with('message','Data Added Successfully');
    }



    public function edit($about_id)
    {
       $aboutus = Aboutus::find($about_id);
        return view('admin.setting.edit',compact('aboutus'));
    }

    public function update(Request $request,$about_id){
        $aboutus = Aboutus::find($about_id);
        $aboutus-> title = $request->input('title');
        $aboutus-> subtitle = $request->input('subtitle');
        if($request->hasfile('image')){
            $destination = 'uploads/aboutus/'.$aboutus->image;
            if(File::exists($destination )){
                File::delete($destination );
            }
            $file = $request->file('image');
            $filename= time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/aboutus/',$filename);
            $aboutus->image = $filename;
        }
        $aboutus-> description = $request->input('description');
        $aboutus->update();
        return redirect('admin/aboutus')->with('message','Aboutus Updated Successfully');
    }


    public function destroy($about_id)
    {
        $aboutus = Aboutus::find($about_id);
        $destination = 'uploads/aboutus/'.$aboutus->image;
            if(File::exists($destination ))
            {
                File::delete($destination );
            }
        $aboutus->delete();
        return redirect('admin/aboutus')->with('message','Aboutus deleted successfully');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Slider;
use App\Http\Requests\SliderFormRequest;
class SliderController extends Controller
{
    
    public function slider(){
        $sliders = Slider::all();
        return view('admin.slider.set',compact('sliders'));
    }
    
    public function create(){
        return view('admin.slider.create');
    }

    public function edit(Slider $slider){
       
        return view('admin.slider.edit',compact('slider'));
    }
    

    public function store(SliderFormRequest $request){
        $data = $request->validated();
        $slider = new Slider;
        $slider->title = $data['title'];
        $slider->description = $data['description'];

        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename= time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/slider/',$filename);
            $slider->image = $filename;
        }
        $slider->status = $request->status == true ? '1':'0';
        $slider->save();
        return redirect('admin/sliders')->with('message','Slider Added Successfully');
    }
    
    public function update(SliderFormRequest $request,$slider_id){
        $data = $request->validated();
        $slider = Slider::find($slider_id); 
        $slider->title = $data['title'];
        $slider->description = $data['description'];

        if($request->hasfile('image')){
            $destination = 'uploads/slider/'.$slider->image;
            if(File::exists($destination )){
                File::delete($destination );
            }
            $file = $request->file('image');
            $filename= time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/slider/',$filename);
            $slider->image = $filename;
        }
    
        $slider->status = $request->status == true ? '1':'0';
        $slider->update();
        return redirect('admin/sliders')->with('message','Slider Updated Successfully');
    }




    public function destroy(Slider $slider)
    {
        
        if($slider->count()>0){
        $destination = $slider->image;
            if(File::exists($destination ))
            {
                File::delete($destination );
            }
        $slider->delete();
        return redirect('admin/sliders')->with('message','Slider Deleted Successfully');
    }
    else{
        return redirect('admin/sliders')->with('message','No Slider Found');
    }
}

}

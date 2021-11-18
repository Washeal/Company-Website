<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slidermodel;
use Image; 
use Auth;



class SliderController extends Controller
{
    public function HomeSlider(){

        $sliders=Slidermodel::latest()->get();

        return view('admin.slider.index',compact('sliders'));

    }

    public function AddSlider(){
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request){

        $slider_image=$request->file('Slide_image');

        $name_gen=hexdec(uniqid()).".".$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_image='image/slider/'.$name_gen;

        Slidermodel::insert([
            'title'=> $request->title_name,
            'decription'=> $request->descrip_txt,
            'image'=>$last_image,
            

        ]);


        $notification=array(
            'message'=>'Inserted Successfully',
            'alert-type'=>'success'
        );

        return Redirect()->Route('home.Slider')->with($notification);


    }

    public function Edit($id){

        $slides=Slidermodel::find($id);
        return view('admin.slider.edit',compact('slides'));

    }

    public function update(Request $request,$id){

        $old_img=$request->old_img;
        

        $slider_image=$request->file('Slide_image');

        if($slider_image){
            $name_gen=hexdec(uniqid()).".".$slider_image->getClientOriginalExtension();
            Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
            $last_image='image/slider/'.$name_gen;
    
             unlink($old_img);
               
            Slidermodel::find($id)->update([
                'title'=> $request->title_name,
                'decription'=> $request->descrip_txt,
                'image'=>$last_image,
                
    
            ]);
    

            $notification=array(
                'message'=>'Update Successfully',
                'alert-type'=>'info'
            );
    
            return Redirect()->back()->with($notification);

        }else{

            Slidermodel::find($id)->update([
                'title'=> $request->title_name,
                'decription'=> $request->descrip_txt,
                
                
    
            ]);
    
            $notification=array(
                'message'=>'Update Successfully',
                'alert-type'=>'info'
            );
    
            return Redirect()->back()->with($notification);
        }

    }


    public function delete($id){

        $image=Slidermodel::find($id);
        $old_imgs=$image->image;

        unlink($old_imgs);


        Slidermodel::find($id)->delete();



        $notification=array(
            'message'=>'Delete Successfully',
            'alert-type'=>'warning'
        );

        return Redirect()->back()->with($notification);




    }
}

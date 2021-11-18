<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\MultiImage;

use Illuminate\Support\Carbon;
use Image; 
use Auth;



class Brandcontroller extends Controller
{

    public function __construct(){
           
        $this->middleware('auth');
      }
    
    public function AllBrand(){

        $brands=Brand::latest()->paginate(5);

        return view("admin.brand.index",compact('brands'));
    }

    public function storeBrand(Request $request){

        $brand_image=$request->file('brand_image');

        // $name_gen=hexdec(uniqid());

        // $exe_gene=strtolower($brand_image->getClientOriginalExtension());

        // $img_name=$name_gen.".".$exe_gene;

        // $up_location="image/brand/";

        // $last_image=$up_location.$img_name;

        // $brand_image->move($up_location, $img_name);

        $name_gen=hexdec(uniqid()).".".$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);
        $last_image='image/brand/'.$name_gen;

        Brand::insert([
            'brand_name'=> $request->brand_name,
            'brand_image'=>$last_image,
            'created_at'=>Carbon::now()
        ]);

        $notification=array(
            'message'=>'Inserted Successfully',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);



    }

    public function Edit($id){

        $brands=Brand::find($id);
        return view("admin.brand.edit",compact('brands'));



    }
    public function update(Request $request,$id){
        
        $old_img=$request->old_img;
        $brand_image=$request->file('brand_image');

        if($brand_image){

            $name_gen=hexdec(uniqid());

            $exe_gene=strtolower($brand_image->getClientOriginalExtension());
    
            $img_name=$name_gen.".".$exe_gene;
    
            $up_location="image/brand/";
    
            $last_image=$up_location.$img_name;
    
            $brand_image->move($up_location, $img_name);
             unlink($old_img);
            Brand::find($id)->update([
                'brand_name'=> $request->brand_name,
                'brand_image'=>$last_image,
                'created_at'=>Carbon::now()
            ]);
    
            $notification=array(
                'message'=>'Update Successfully',
                'alert-type'=>'info'
            );
    
            return Redirect()->back()->with($notification);

        }else{
            Brand::find($id)->update([
                'brand_name'=> $request->brand_name,
                
                'created_at'=>Carbon::now()
            ]);
    
            return Redirect()->back()->with("success","Update Successfully");

        }


    }

    public function delete($id){
        $image=Brand::find($id);
        $old_image=$image->brand_image;

        unlink($old_image);
        
        Brand::find($id)->delete();

        $notification=array(
            'message'=>'Delete Successfully',
            'alert-type'=>'error'
        );

        return Redirect()->back()->with($notification);




    }


    /// That Is for Multi image

     public function MultiImg(){

        $images=MultiImage::all();
          return view("admin.multi.index",compact('images'));
     }

     public function Multistore(Request $request){

        $images=$request->file('image_m');

        foreach($images as $image){
         
        $name_gen=hexdec(uniqid()).".".$image->getClientOriginalExtension();
        Image::make($image)->resize(300,200)->save('image/multi/'.$name_gen);
        $last_image='image/multi/'.$name_gen;

        MultiImage::insert([
            
            'image'=>$last_image,
            'created_at'=>Carbon::now()
        ]);

    } //end Foreach

        return Redirect()->back()->with("success","Inserted Successfully");

         
     }

     public function Logout(){
         Auth::logout();
        return Redirect()->Route('login')->with("success","Logout Successfully");


     }



}

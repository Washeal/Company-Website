<?php

namespace App\Http\Controllers;
use App\Models\About;


use Illuminate\Http\Request;

class AboutController extends Controller
{
    

    public function HomeAbout(){

        $abouts=About::latest()->get();

        return view('admin.about.index',compact('abouts'));
    }

    public function Create(){
        return view('admin.about.create');
    }

    public function store(Request $request){
        About::insert([

            'title'=>$request->title_name,
            'short_descrip'=>$request->short_descrip,
            'long_descrip'=>$request->long_descrip

        ]);

        $notification=array(
            'message'=>'Inserted Successfully',
            'alert-type'=>'success'
        );

        return Redirect()->Route('Home.About')->with($notification);


    }

    public function Edit($id){

        $abouts=About::find($id);

        return view('admin.about.edit',compact('abouts'));

    }

    public function update(Request $request,$id){

        About::find($id)->update([

             'title'=>$request->title_name,
             'short_descrip'=>$request->title_name, 
             'long_descrip'=>$request->title_name
        ]);


        return Redirect()->route('Home.About')->with("success","");

        $notification=array(
            'message'=>'Update Successfully',
            'alert-type'=>'info'
        );

        return Redirect()->Route('Home.About')->with($notification);


    }
          

    public function delete($id){

       About::find($id)->delete();


       $notification=array(
        'message'=>'Inserted Successfully',
        'alert-type'=>'warning'
    );

    return Redirect()->back()->with($notification);

          
        
    }



    

   


}

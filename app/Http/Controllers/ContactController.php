<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactFrom;


class ContactController extends Controller
{
    public function Contact(){
       $contacts=Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function Create(){

        return view("admin.contact.create");
    }

    public function Store(Request $request){
        Contact::insert([
           
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone
        ]);

        return Redirect()->Route('admin.contact')->with("success","Inserted Successfully");

    }
    public function Edit($id){

        $contacts=Contact::find($id);

        return view('admin.contact.edit',compact('contacts'));

    }
    public function update(Request $request, $id){

        Contact::find($id)->update([
            
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone

        ]);

        return Redirect()->Route('admin.contact')->with("success","Update Successfully");


    }

    public function Delete($id){

        Contact::find($id)->delete();
        return Redirect()->back()->with("success","Delete Successfully");


    }

    public function Contacts(){

        $Contactss=Contact::first();

        return view('page.contact',compact('Contactss'));
    }

    public function Stores(Request $request){
        ContactFrom::insert([

            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message
            
        ]);

        $notification=array(
            'message'=>'Submit Successfully',
            'alert-type'=>'success'
        );

        return Redirect()->Route('Contacts')->with($notification);

    }

    public function form(){

        $forms=ContactFrom::latest()->get();

        return view('admin.form.index',compact('forms'));
    }

    public function Deletes($id){
        ContactFrom::find($id)->delete();


        $notification=array(
            'message'=>'Delete Successfully',
            'alert-type'=>'error'
        );

        return Redirect()->back()->with($notification);

    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class Changepass extends Controller
{
    
    public function Password(){

         return view('admin.body.change_pass');
    }

    public function UpdatePass(Request $request){

        $validate=$request->validate([
           
            'old_password'=>'required',
            'password' => 'required|confirmed'
        ]);

        $hashpass= Auth::user()->password;
        if(Hash::check($request->old_password,$hashpass)){
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            
        return Redirect()->Route('login')->with("success","Password Change Successfully");
            

        }

    }
    public function profileupdate(){
          
       if(Auth::user()){
           $users=User::find(Auth::user()->id);

           if($users){
               return view('admin.body.profile_up',compact('users'));

           }
       }
    }

    public function storeP(Request $request){

           $user=User::find(Auth::user()->id);

           $user->name = $request['name'];
           $user->email = $request['email'];
           $user->save();

           return Redirect()->back()->with("success","Profile Update Successfully");



    }
}

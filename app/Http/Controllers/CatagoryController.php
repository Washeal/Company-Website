<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Carbon;


class CatagoryController extends Controller
{

    public function __construct(){
           
          $this->middleware('auth');
        }

    public function AllCatagory(){
     $catagorys=category::latest()->paginate(5);
     $trash=category::onlyTrashed()->latest()->paginate(3);
       // $catagorys=DB::table("catagorys");

        return view("admin.catagory.index",compact('catagorys','trash'));
    }

    public function AddCatagory(Request $request){
       
        // $catagory = new category;

        // $catagory->cata_name=$request->catagory_name;
        // $catagory->user_id=Auth::user()->id;
        // $catagory->save();

        category::insert([
              'cata_name'=>$request->catagory_name,
              'user_id'=> Auth::user()->id,
              'created_at'=> Carbon::now()  

        ]);

        // $data=array();
        // $data['cata_name']=$request->catagory_name;
        // $data['user_id']=Auth::user()->id;
        // DB::table('categories')->insert($data);

 

        $notification=array(
            'message'=>'Catagory Inserted Successfully',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);

      




   }

   public function Edit($id){

    $catagorys=category::find($id);
    return view("admin.catagory.edit",compact('catagorys'));

        
   }

   public function update(Request $request, $id){

    $update=category::find($id)->update([

        'cata_name'=>$request->catagory_name,
        'user_id'=> Auth::user()->id
         
    ]);


   $notification=array(
    'message'=>' Catagory Update Successfully',
    'alert-type'=>'info'
);

return Redirect()->route('catagory')->with($notification);


   }

   public function Softdelete($id){

       $delete=category::find($id)->delete();




       
       $notification=array(
        'message'=>'Catagory Delete Successfully',
        'alert-type'=>'error'
    );

    return Redirect()->back()->with($notification);

       

   }

   public function restore($id){

      $restore=category::withTrashed()->find($id)->restore();
      return Redirect()->back()->with("success","Restore Successfully");


   }

   public function parmanet_delete($id){

    $pdelete=category::onlyTrashed()->find($id)->forceDelete();

    return Redirect()->back()->with("success","Parmanently Delete");


   }

     

}

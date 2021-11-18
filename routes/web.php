<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\MultiImage;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\Brandcontroller;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MultipicController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Changepass;






Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {

    $brands=DB::table('brands')->get();
    $about=DB::table('abouts')->first();
    $images=MultiImage::all();
    return view('home',compact('brands','about','images'));
});

//all catagory

Route::get("/catagory/all",[CatagoryController::class,'AllCatagory'])->name('catagory');

Route::post("/catagorys/add",[CatagoryController::class,'AddCatagory'])->name('catagorys');

Route::get("/catagory/edit/{id}",[CatagoryController::class,'Edit']);

Route::post("/catagory/update/{id}",[CatagoryController::class,'update']);

Route::get("/softdelete/catagory/{id}",[CatagoryController::class,'Softdelete']);

Route::get("/catagory/resote/{id}",[CatagoryController::class,'restore']);

Route::get("/catagory/pdelete/{id}",[CatagoryController::class,'parmanet_delete']);



             // Brand controller

Route::get("/Brand/all",[Brandcontroller::class,'AllBrand'])->name('all.brand');
Route::post("/Brand/add",[Brandcontroller::class,'storeBrand'])->name('store.brand');
Route::get("/brand/edit/{id}",[Brandcontroller::class,'Edit']);
Route::post("/catagory/update/{id}",[Brandcontroller::class,'update']);

Route::get("/delete/brand/{id}",[Brandcontroller::class,'delete']);


       //multi Image

Route::get("/Multi/Image",[Brandcontroller::class,'MultiImg'])->name('multi.image');
Route::post("/Multi/add",[Brandcontroller::class,'Multistore'])->name('store.img');


            //SIDEBAR/-- Home Content

 Route::get("/Home/Slider",[SliderController::class,'HomeSlider'])->name('home.Slider');
Route::get("/Add/Slider",[SliderController::class,'AddSlider'])->name('add.slider');
Route::post("/Store/Slider",[SliderController::class,'StoreSlider'])->name('store.slider');

Route::get("/slider/edit/{id}",[SliderController::class,'Edit']);
Route::post("/slider/update/{id}",[SliderController::class,'update']);
Route::get("/delete/slider/{id}",[SliderController::class,'delete']);


         //About Home

 Route::get("/Home/About",[AboutController::class,'HomeAbout'])->name('Home.About');
 Route::get("/Create/About",[AboutController::class,'Create'])->name('about.Create');
 Route::post("/Store/About",[AboutController::class,'store'])->name('Home.store');
 Route::get("/Edit/About/{id}",[AboutController::class,'Edit']);
 Route::post("/update/About/{id}",[AboutController::class,'update']);
Route::get("/delete/About/{id}",[AboutController::class,'delete']);


        //Portfulio Image  Page Part

Route::get("/Portfulio",[MultipicController::class,'Portfulio'])->name('portfulio');

        //Contact  Page Part
  Route::get("/Admin/Contact",[ContactController::class,'Contact'])->name('admin.contact');
  Route::get("/Create/Contact",[ContactController::class,'Create'])->name('create.contact');
  Route::post("/Store/Contact",[ContactController::class,'Store'])->name('store.contact');
  Route::get("/edit/contact/{id}",[ContactController::class,'Edit']);
  Route::post("/update/contact/{id}",[ContactController::class,'update']);
  Route::get("/delete/contact/{id}",[ContactController::class,'Delete']);

Route::get("/contact/page",[ContactController::class,'Contacts'])->name('Contacts');
Route::post("/store/page",[ContactController::class,'Stores'])->name('store.Contacts');
Route::get("/form/page",[ContactController::class,'form'])->name('form.Contacts');
Route::get("/delete/form/{id}",[ContactController::class,'Deletes']);


        ////password admin
Route::get("/change/password",[Changepass::class,'Password'])->name('change.pasword');
Route::post("/update/password",[Changepass::class,'UpdatePass'])->name('password.update');
       //profile update
Route::get("/profile/update",[Changepass::class,'profileupdate'])->name('profile.update');
Route::post("/profile/store",[Changepass::class,'storeP'])->name('profile.store');









       



Route::middleware(['auth:sanctum','verified'])->get('/dashboard', function () {
   // $user=User::all();

  // $user=DB::table('users')->get();

    return view('admin.index');
})->name('dashboard');

//logout

Route::get("User/logout",[Brandcontroller::class,'Logout'])->name('user.logut');


<?php

namespace App\Http\Controllers;

use App\Models\MultiImage;


use Illuminate\Http\Request;

class MultipicController extends Controller
{
    public function Portfulio(){

        $images=MultiImage::all();

        return view('page.portfulio',compact('images'));
    }
}

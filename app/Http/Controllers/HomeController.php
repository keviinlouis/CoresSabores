<?php

namespace App\Http\Controllers;

use App\Models\Admin\Header;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $header = Header::getHeaderActive();
        if(is_array($header)){
            $header = $header['obj'];
        }
        if($header == null){
            $header = Header::getDefault();
        }


        return view('home.index', get_defined_vars());
    }

    public function ajaxHeaders(){

    }
}

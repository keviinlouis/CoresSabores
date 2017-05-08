<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;


class AdminController extends Controller
{
    public function index(){

        $header = Header::getHeaderActive();
        if(is_array($header)){
            $header = $header['obj'];
        }


        return view('admin.home.index', get_defined_vars());
    }
}

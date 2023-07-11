<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){
        return view('home.main');
    }
    public function redirect(){
        $userType=Auth::user()->user_type;
        if ( $userType== '1') {
           return view('admin.mainPanel');
        }else{
            return view('home.main');
        }
    }
}

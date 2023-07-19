<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){
        $products = Product::orderByDesc('id')->take(6)->get();
        return view('home.main',compact('products'));
    }
    public function redirect(){
        $userType=Auth::user()->user_type;
        if ( $userType== '1') {
           return view('admin.mainPanel');
        }else{
        $products = Product::orderByDesc('id')->take(1)->get();
        return view('home.main',compact('products'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
   public function index(Request $request ,$id)
   {
    $productdata=Product::find($id);
    return view('home.singleproduct',compact('productdata'));
   }
}

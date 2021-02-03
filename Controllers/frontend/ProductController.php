<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(){
        $products = Product::orderBy('price','desc')->get();
        return view('frontend.index',compact('products'));
    }

}

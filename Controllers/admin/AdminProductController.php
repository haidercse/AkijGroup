<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImage;

use File;

class AdminProductController extends Controller
{
    function index(){
        return view('backend.pages.product.index');
    }


    //save database and public

    function create(Request $req){

        $req->validate([
            'title' => 'bail|required|max:155',
            'description' => 'required',
            'price' => 'required |numeric',
            'quantity' => 'required |numeric',

        ]);

        $product = new Product;
        $product->title = $req->title;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->quantity = $req->quantity;

        $product->slug = str::slug($req->title);

        $product->category_id = 1;
        $product->brand_id = 1;
        $product->admin_id = 1;
        $product->save();


        //productImage model's insert Image
        if($req->has('product_image')){
            $image = $req->file('product_image');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest =public_path('/images');
            $image->move($dest,$reImage);

            //save data
            $product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $reImage;
            $product_image->save();


        }

        return back()->with('success','All product has been Added!!');
    }

    //show product table

    function list(){
        $products = Product::orderBy('price','desc')->get();
       // $images = ProductImage::orderBy('product_id')->get();
        return view('backend.pages.product.show_product',compact('products'));
    }

    function update($id){
        $products =  Product::find($id);
        $image = ProductImage::find($id);
        return view('backend.pages.product.edit-page',compact('products','image'));

     }

     function store(Request $req, $id){
         $req->validate([
             'title' => 'bail|required|max:155',
             'description' => 'required',
             'price' => 'required |numeric',
             'quantity' => 'required |numeric',

         ]);

        $product =  Product::find($id);
        $product->title = $req->title;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->quantity = $req->quantity;
        $product->save();
        //update image

        if($req->has('product_image')){
            $image = ProductImage::find($id);
            if(File::exists('/images'.$image->image)) {

                File::delete('/images'.$image->image);
            }
            $image = $req->file('product_image');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest =public_path('/images');
            $image->move($dest,$reImage);

            //save data
            $product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $reImage;
            $product_image->save();


        }





        return redirect()->route('admin.product.list')->with('success','All product has been Added!!');

        }

        function delete(Request $req, $id){
          $product = Product::find($id);
          if(!is_null($product)){
              $product->delete();
          }

          return back()->with('success','Product has been deleted successfully!!');
        }
}

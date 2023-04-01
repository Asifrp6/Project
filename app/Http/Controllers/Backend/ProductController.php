<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Illuminate\Http\Request;

use Image;
use File;

class ProductController extends Controller
{
    public function index(){
        return view("backend.product.addproduct");
    
        }
        // public function homepage(){
        //     return view("frontend.index");
        
        //     }
        public function store(Request $request)
    {
       
       if($request->img){

        $image = $request->file('img');
        $customName = rand().".".$image->getClientOriginalExtension();
        $location = public_path("backend/pimage/".$customName);
        Image::make($image)->save($location);

       }
       
       
        $product = new Product;
        $product->name = $request->name;
        $product->cat_name = $request->cat_name;
        $product->brand_name = $request->brand_name;
        $product->des = $request->des;
        $product->img = $customName;
        $product->status = $request->status;
        $product->save();
        return redirect()->route("showproduct");

    }

    public function show()
    {

        $products = Product::all();
       return view("backend.product.manage",compact("products"));
    }

    public function delete($id)
    {
        $delete = Product::find($id);

        if(File::exists("backend/pimage/".$delete->img)){
            File::delete("backend/pimage/".$delete ->img);

        }
        $delete->delete();
        return back();


    }

    public function edit($id)
    {
        $edit = Product::find($id);
        return view("backend.product.update",compact("edit"));
    }
    
    public function update(Request $request, $id)
    {
        $update = Product::find($id);
       
        if($request->img){

             if(File::exists("backend/pimage/".$update->img)){
                 File::delete("backend/pimage/".$update->img);

                $image = $request->file('img');
                $customName = rand().".".$image->getClientOriginalExtension();
                $location = public_path('backend/pimage/'.$customName);
                Image::make($image)->save($location);
                $update->image =  $customName;
           }
         }
        
        $update->name = $request->name;
        $update->des = $request->des;
        // $update->img = $customName;
        $update->status = $request->status;
        $update->update();

        return redirect()->route("showproduct");
    }

    public function active($id)
    {
        $active = Product::find($id);
        $active->status=2;
        $active->update();
        return back();


    }
    public function inactive($id)
    {
        $inactive = Product::find($id);
        $inactive->status=1;
        $inactive->update();
        return back();


    }


    function view(){
        $products = Product::all();
        return view("frontend.index", compact("products"));
    }

    function singleproduct($id){

        $singleproduct = Product::find($id);
        return view("frontend.singleproduct", compact("singleproduct"));
    }
}

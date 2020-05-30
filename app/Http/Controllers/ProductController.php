<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
// use Response;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function addproduct(){
        return view('admin.addproduct');
    }

    public function editproduct($id){

        $selectProduct=DB::table('products')
                        ->where('id',$id)
                        ->first();

        $managedProduct= view('admin.editproduct')
                        ->with('selectProduct',$selectProduct);

        return view('layouts.appadmin')->with('admin.editproduct',$managedProduct);
    }

    public function saveproduct(Request $request){
        $this->validate($request,[
            //  required attribute for product_name
            'product_name'=>'required',
            //  required attribute for price
            'price'=>'required',
            //  cancel validation, if the file size is greater than 2M
            'product_image'=>'image|nullable|max:1999'
        ]);

        if($request->hasFile('product_image')){
            // print("<h1> The Product Name is ".$request->input('product_name')."<br/>".
            // "And The Product price is ".$request->input('product_price')."<br></h1>");

            $fileNameComplete=$request->file('product_image')->getClientOriginalName();
            $filename=pathinfo($fileNameComplete,PATHINFO_FILENAME);
            $fileext=$request->file('product_image')->getClientOriginalExtension();

            $filenameToStore=$filename."_".time().".".$fileext;
            $path=$request->file('product_image')->storeAs('public/product_images',$filenameToStore);


        }else{
            $filenameToStore="noimage.jpg";
        }
        $data=array();
        $data['product_name']=$request->input('product_name');
        $data['price']=$request->input('price');
        $data['product_image']=$filenameToStore;
        $data['created_at']=date("Y-m-d H:i:s");

        DB::table('products')->insert($data);

        // foreach($data as $val){
        //     print("<h1>".$val."<br/></h1>");
        // }

        Session::put('message',"The Product is added succesfully");
        return redirect('/addproduct');
    }

    public function updateproduct(Request $request){
        // print_r($request->input);
        // die;
        $this->validate($request,[
            //  required attribute for product_name
            'product_name'=>'required',
            //  required attribute for price
            'price'=>'required',
            //  cancel validation, if the file size is greater than 2M
            'product_image'=>'image|nullable|max:1999'
        ]);

        $data=array();
        $data['product_name']=$request->input('product_name');
        $data['price']=$request->input('price');
        $data['updated_at']=date("Y-m-d H:i:s");

        if($request->hasFile('product_image')){
            $fileNameComplete=$request->file('product_image')->getClientOriginalName();
            $filename=pathinfo($fileNameComplete,PATHINFO_FILENAME);
            $fileext=$request->file('product_image')->getClientOriginalExtension();

            $filenameToStore=$filename."_".time().".".$fileext;
            $path=$request->file('product_image')->storeAs('public/product_images',$filenameToStore);

            $data['product_image']=$filenameToStore;

            $selectOldImage=DB::table('products')
                            ->where('id',$request->input('product_id'))->first();

            if($selectOldImage->product_image!='noimage.jpg'){
                Storage::delete('public/product_image/'.$selectOldImage->product_image);
            }
        }

        $updated=DB::table('products')
            ->where('id',$request->input('product_id'))
            ->update($data);
        if($updated){
            Session::put('message',"The Product is updated succesfully");
            return redirect('/addproduct');
        }else{
            Session::put('error',"The Product update failed");
            return redirect('/editproduct/'.$request->input('product_id'));
        }


    }

    public function deleteproduct($id){
        $selectProduct=DB::table('products')
                        ->where('id',$id)
                        ->first();

        if($selectProduct->product_image!='noimage.jpg'){
            Storage::delete('public/product_image/'.$selectProduct->product_image);
        }

        $deleted=DB::table('products')
            ->where('id',$id)
            ->delete();
        if($deleted){
            Session::put('message',"The Product is deleted succesfully");
            return redirect('/addproduct');
        }
    }
}

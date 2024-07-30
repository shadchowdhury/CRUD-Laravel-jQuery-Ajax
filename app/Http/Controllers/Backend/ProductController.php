<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\ProductModel;
use Symfony\Component\Console\Helper\ProgressBar;

class ProductController extends Controller
{
    public function addproduct()
    {
        return view('backend.addproduct');
    }


    public function productstore(Request $req)
    {
        $product= new ProductModel;

        $product->pname = $req->pname;
        $product->pdes = $req->pdes;
        $product->cat = $req->cat;
        $product->scat = $req->scat;
        $product->price = $req->price;
        $product->status = $req->status;
        $product->save();
        toastr()->success('Data has been saved successfully!');
        return redirect()->route("showproduct");
        // dd($pinfo);
    }

    public function showproduct()
    {
        $products= ProductModel::all();
        //dd($products);
        return view('backend.showproduct', compact("products"));
    }


    public function editproduct($id)
    {
        $product= ProductModel::find($id);
        return view('backend.editproduct',compact("product"));
    }

    public function update(Request $req,$id)
    {
        $product= ProductModel::find($id);

        $product->pname = $req->pname;
        $product->pdes = $req->pdes;
        $product->cat = $req->cat;
        $product->scat = $req->scat;
        $product->price = $req->price;
        $product->status = $req->status;
        $product->update();
        toastr()->info('Data has updated successfully!');
        return redirect()->route("showproduct");
        // dd($pinfo);
    }

    public function delete($id){
        $product = ProductModel::find($id);
        $product->delete();
        toastr()->warning('Data has deleted successfully!');
        return redirect()->route("showproduct");
    }

    public function status($id){
        $product = ProductModel::find($id);
        if($product->status==1){
            $product->status = 2;
        }
        else{
            $product->status = 1;
        }
        $product->update();
        toastr()->info('Status has changed successfully!');
        return redirect()->route("showproduct");
    }

}

<?php

namespace App\Http\Controllers;

use GuzzleHttp\PrepareBodyMiddleware;
use Illuminate\Http\Request;
use App\Models\Product;
use Psy\Readline\Hoa\Console;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('products.index',['products'=>$products]);

    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'required'
        ]);


        Product::create($data);

        return redirect(route('products.index'));
    }
    
    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }


    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'required'
        ]);

        $product->update($data);
        return redirect(route('products.index'))->with('Success','Product updated Successfully');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect(route('products.index'))->with('Success','Product Deleted Successfully');
    }
}

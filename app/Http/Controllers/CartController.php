<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $carts=Cart::all();
        $categories=Category::all();
        $products=Product::all();
        $total=Cart::selectRaw('sum(carts.quantity*products.price) as Total')
                     ->join('products','carts.product_id','=','products.id')->first();
        $quantity=$request->input('quantity');
        
        return view('carts.index',compact('carts','products','categories','quantity','total'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'product_id' => 'required | exists:products,id',
        ]);
        if(Cart::where('product_id',$validated['product_id'])->exists()){
            Cart::where('product_id',$validated['product_id'])->increment('quantity');
        }
       else{
        Cart::create([
        'product_id' => $validated['product_id'],
       ]);
        }
       return redirect(route('carts.index'))->with('message',"Product added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        $product=$cart->product;
        return redirect(route('carts.index'))->with('message',"Product <strong>$product->title</strong> deleted from cart!");
    }
}

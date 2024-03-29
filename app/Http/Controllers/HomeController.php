<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productos = Product::all()->take(10);
        $products_total = Product::all()->count();
        return view('home',compact('productos','products_total'));
    }

   
    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        $products_total = Product::all()->count();
        return response()->json([
            'total' => $products_total,
            'message' => "el producto $product->id con nombre $product->name fue eliminado"
        ]);
    }
}

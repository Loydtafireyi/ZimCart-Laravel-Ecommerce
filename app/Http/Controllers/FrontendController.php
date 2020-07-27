<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
    	$products = Product::all();

    	return view('welcome', compact('products'));
    }

    public function show($slug)
    {
    	$product = Product::where('slug', $slug)->firstOrFail();

    	$relatedProducts = $product->category->products->all();

    	return view('product.show', compact('product', 'relatedProducts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Contact;
use App\Product;
use App\SystemSetting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
    	$products = Product::all();

        $slides = Slide::all();

    	return view('welcome', compact('products', 'slides'));
    }

    public function show($slug)
    {
    	$product = Product::where('slug', $slug)->firstOrFail();

    	$relatedProducts = $product->category->products->all();

    	return view('product.show', compact('product', 'relatedProducts'));
    }

    public function contact()
    {
        $info = SystemSetting::first();

        $products = Product::orderBy('id', 'DESC')->take(4)->get();

        return view('contact', compact('info', 'products'));
    }

    public function contactStore(Request $request)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        session()->flash('success', "Hey $request->name, thanks for reaching out we will get back to you withinn 24 hours");

        return redirect()->back();
    }
}

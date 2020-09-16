<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Terms;
use App\Contact;
use App\Product;
use App\Category;
use App\SubCategory;
use App\PrivacyPolicy;
use App\SystemSetting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Returns the platform welcome or landing page
    public function index()
    {
        $categories = Category::all();

        $products = Product::orderBy('created_at', 'DESC')->paginate(8);

        $slides = Slide::all();

         $systemName = SystemSetting::first();

        return view('welcome', compact('products', 'slides', 'categories', 'systemName'));
    }

    // show single product details
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $singleImage = $product->photos()->get()->first();

        $relatedProducts = $product->category->products()->inRandomOrder()->take(5)->get();

        $systemName = SystemSetting::first();

        $color = $product->attributes()->where('attribute_name', 'Color')->get();
        $sizes = $product->attributes()->where('attribute_name', 'Size')->get();
        $pieces = $product->attributes()->where('attribute_name', 'Pieces')->first();
        // dd($pieces);

        return view('product.show', compact('product', 'relatedProducts', 'singleImage', 'systemName', 'color', 'sizes', 'pieces'));
    }

    // Get contact us page
    public function contact()
    {
        $info = SystemSetting::first();

        $products = Product::orderBy('id', 'DESC')->take(4)->get();

        return view('contact', compact('info', 'products'));
    }
    //send message from contact us
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

    // display all categories and products
    public function categories()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(12);

        $category = Category::all();

        $systemInfo = SystemSetting::first();

        return view('categories', compact('products', 'category', 'systemInfo'));
    }

    // diplay a single category and its products
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = $category->products()->orderBy('created_at', 'DESC')->paginate(12);

        $categories = Category::all();

        return view('category', compact('category', 'categories', 'products'));
    }

    // diplay a single subcategory and its products
    public function subcategory($slug)
    {
        $subCategory = SubCategory::where('slug', $slug)->firstOrFail();

        $products = $subCategory->products()->orderBy('created_at', 'DESC')->paginate(12);

        $categories = Category::all();

        return view('sub-category', compact('products', 'categories', 'subCategory'));
    }

    // return products on sale
    public function onSale()
    {
        $products = Product::where('on_sale', 1)->paginate(12);

        $categories = Category::all();

        return view('sale', compact('categories', 'products'));
    }

    // terms and contions
    public function terms()
    {
        $terms = Terms::firstOrFail();

        return view('terms', compact('terms'));
    }

    // return privacy privacy
    public function privacy()
    {
        $policy = PrivacyPolicy::firstOrFail();

        return view('privacy', compact('policy'));
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Contact;
use App\Product;
use Illuminate\Http\Request;

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
        $users = User::count();
        $orders = Order::count();
        $products = Product::count();
        $messages = Contact::count();
        
        return view('home', compact('products', 'users', 'messages', 'orders'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()->orders()->orderBy('created_at', 'DESC')->paginate(5);

        $recentlyViewed = Product::inRandomOrder()->take(4)->get();

        return view('profile.index', compact('orders', 'recentlyViewed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        if (auth()->id() != $order->user_id) {
            return back()->withErrors('You do not have acces to this!');
        }

         $products = $order->products()->get();

        $recentlyViewed = Product::inRandomOrder()->take(4)->get();

        return view('profile.show', compact('order', 'recentlyViewed', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'password' => 'sometimes|nullable|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        $input = $request->except(['password', 'password_confirmation']);

        if (! $request->filled('password')) {
            $user->fill($input)->save();
            return redirect()->back()->with('success', "Profile updated successfully.");
        }

        $user->password = bcrypt($request->password);
        $user->fill($input)->save();
        return redirect()->back()->with('success', "Profile updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

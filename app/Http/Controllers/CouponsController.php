<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CouponsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if(!$coupon) {
            return redirect()->route('cart.index')->withErrors('Invalid coupon code. Please try agan.');
        }

        session()->put('coupon', [
            'name' => $coupon->code,
            'discount' => $coupon->discount(Cart::subtotal()),
        ]);

        session()->flash('success', 'Coupon applied successfully');

        return redirect()->route('cart.index');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        session()->flash('success', 'Coupon removed successfully');

        return redirect()->route('cart.index');
    }
}

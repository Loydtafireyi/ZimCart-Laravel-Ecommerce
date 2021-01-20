<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\OrderProduct;
use App\SystemSetting;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systemInfo = SystemSetting::first();

        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (Cart::subtotal() - $discount);
        $newTotal = $newSubtotal;

        return view('checkout', compact('systemInfo'))->with([
            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
            'newTotal' => $newTotal,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create payment working';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'billing_fullname' => 'required',
            'billing_address' => 'required',
            'billing_city' => 'required',
            'billing_province' => 'required',
            'billing_zipcode' => 'required',
            'billing_phone' => 'required',
            'notes' => 'max:255',
        ]);

        $order = Order::create([
            'order_number' => uniqid(),
            'user_id' => auth()->user()->id ?? null,
            'billing_discount' => $this->getNumbers()->get('discount'),
            'billing_discount_code' => $this->getNumbers()->get('code'),
            'billing_subtotal' => $this->getNumbers()->get('newSubtotal'),
            'billing_tax' => $this->getNumbers()->get('newTax'),
            'billing_total' => $this->getNumbers()->get('newTotal'),
            'billing_fullname' => $request->billing_fullname,
            'billing_address' => $request->billing_address,
            'billing_city' => $request->billing_city,
            'billing_province' => $request->billing_province,
            'billing_zipcode' => $request->billing_zipcode,
            'billing_phone' => $request->billing_phone,
            'billing_email' => $request->billing_email,
            'notes' => $request->notes,
            'error' => null, 
        ]);

        // update user info if user is authenticated
        if(auth()->check()) {
            auth()->user()->update([
                'phone' => $request->billing_phone,
                'address' => $request->billing_address,
                'city' => $request->billing_phone,
                'province' => $request->billing_province,
                'zipcode' => $request->billing_zipcode,
                'notes' => $request->notes
            ]);
        }

        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id, 
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);        
        }

        //paypal payment
        if ($request->payment_method == 'paypal') {
            # redirect to paypal
            return redirect(route('paypal.checkout', $order->id));

        }

        //clear cart contents
        Cart::destroy();

        session()->flash('success', "Thank you $request->billing_fullname, your order has been placed successfully!");

        return redirect(route('my-orders.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    private function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['name'] ?? null;
        $newSubtotal = (Cart::subtotal() - $discount);
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal;

        return collect([
            'tax' => $tax,
            'code' => $code,
            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
        ]);
    }
}

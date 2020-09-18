<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{
    // class shared property
    private function checkoutData($orderId) {
        //get total from cart
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (Cart::subtotal() - $discount);
        $newTotal = $newSubtotal;

        $cartItems = Cart::Content()->map(function ($item) {
            return [
                'name' => $item->name,
                'price' => $item->price,
                'qty' => $item->qty
            ];
        })->toArray();

        //checkout data
        $checkoutData = [
            'items' => $cartItems,

            'return_url' => route('paypal.success', $orderId),
            'cancel_url' => route('paypal.cancel'),
            'invoice_id' => uniqid(),
            'invoice_description' => "Order description",
            'total' => $newTotal
        ];

        return $checkoutData;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paypalCheckout($orderId)
    {

        $checkoutData = $this->checkoutData($orderId);

        $provider = new ExpressCheckout();

        $response = $provider->setExpressCheckout($checkoutData);

        // This will redirect user to PayPal
        return redirect($response['paypal_link']);


    }

    public function paypalCancel()
    {
        dd('cancel page');
    }

    public function paypalSuccess(Request $request, $orderId)
    {
        $checkoutData = $this->checkoutData();
        
        $token = $request->get('token');

        $payerId = $request->get('PayerID');

        $provider = new ExpressCheckout();

        $response = $provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            // Perform transaction on paypal
            $payment_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $payerId);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
        }



        if (in_array($status, ['completed', 'Processed'])) {
            $order = Order::find($orderId);
            $order->is_paid = 1;
            $order->payment_method = 'paypal';
            $order->save();

            //clear cart contents
            Cart::destroy();

            session()->flash('success', 'Payed & proccessed successfully');

            return redirect(route('my-orders.index'));
        }

        session()->flash('success', 'Payed & proccessed successfully');

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('payment failed');
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
}

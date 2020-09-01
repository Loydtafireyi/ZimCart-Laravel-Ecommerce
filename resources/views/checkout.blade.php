@extends('layouts.frontend')

@section('seo')

<title>{{ $systemInfo->name }} | Checkout</title>
<meta charset="UTF-8">
<meta name="description" content="{{ $systemInfo->description }}">
<meta name="keywords" content="{{ $systemInfo->description }}, {{ $systemInfo->description }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@endsection

@section('content')

<!-- checkout section  -->
<section class="checkout-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 order-2 order-lg-1">
				<form class="checkout-form">
					<div class="cf-title">Billing Address</div>
					<div class="row">
						<div class="col-md-7">
							<p>*Billing Information</p>
						</div>
						<div class="col-md-5">
							<div class="cf-radio-btns address-rb">
								<div class="cfr-item">
									<input type="radio" name="pm" id="one">
									<label for="one">Use my regular address</label>
								</div>
								<div class="cfr-item">
									<input type="radio" name="pm" id="two">
									<label for="two">Use a different address</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row address-inputs">
						<div class="col-md-12">
							<input type="text" placeholder="Address">
							<input type="text" placeholder="Address line 2">
							<input type="text" placeholder="Country">
						</div>
						<div class="col-md-6">
							<input type="text" placeholder="Zip code">
						</div>
						<div class="col-md-6">
							<input type="text" placeholder="Phone no.">
						</div>
					</div>
					<div class="cf-title">Delievery Info</div>
					<div class="row shipping-btns">
						<div class="col-6">
							<h4>Standard</h4>
						</div>
						<div class="col-6">
							<div class="cf-radio-btns">
								<div class="cfr-item">
									<input type="radio" name="shipping" id="ship-1">
									<label for="ship-1">Free</label>
								</div>
							</div>
						</div>
						<div class="col-6">
							<h4>Next day delievery  </h4>
						</div>
						<div class="col-6">
							<div class="cf-radio-btns">
								<div class="cfr-item">
									<input type="radio" name="shipping" id="ship-2">
									<label for="ship-2">$3.45</label>
								</div>
							</div>
						</div>
					</div>
					<div class="cf-title">Payment</div>
					<ul class="payment-list">
						<li>Paypal
							<a href="#"><img src="{{ asset('frontend/img/paypal.png') }}" alt=""></a>
							<div id="paypal-button"></div>

							<!-- Mount the instance within a <label> -->
							<label>Card
							  <div id="card-element"></div>
							</label>

							<!--
							  Or create a <label> with a 'for' attribute,
							  referencing the ID of your container.
							-->
							<label for="card-element">Card</label>
							<div id="card-element"></div>
						</li>
						<li>Credit / Debit card<a href="#"><img src="{{ asset('frontend/img/mastercart.png') }}" alt=""></a></li>
						<li>Pay when you get the package</li>
					</ul>
					<button class="site-btn submit-order-btn">Place Order</button>
				</form>
			</div>
			<div class="col-lg-4 order-1 order-lg-2">
				<div class="checkout-cart">
					<h3>Your Cart</h3>
					<ul class="product-list">
						@foreach(Cart::content() as $item)
						<li>
							<div class="pl-thumb"><img src="/storage/{{ $item->model->photos->first()->images }}" alt=""></div>
							<h6>{{ $item->model->name }}</h6>
							<p>${{ $item->subtotal }}</p>
							<p>Qty {{ $item->qty }}</p>
						</li>
						@endforeach
					</ul>
					<ul class="price-list">
						<li>Total<span>${{ $newSubtotal }}.00</span></li>
						<li>Shipping<span>free</span></li>
						<li class="total">Total<span>${{ $newTotal }}.00</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- checkout section end -->

@endsection

@section('scripts')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    env: 'sandbox', // Or 'production'
    // Set up the payment:
    // 1. Add a payment callback
    payment: function(data, actions) {
      // 2. Make a request to your server
      return actions.request.post('/api/create-payment/')
        .then(function(res) {
          // 3. Return res.id from the response
          return res.id;
        });
    },
    // Execute the payment:
    // 1. Add an onAuthorize callback
    onAuthorize: function(data, actions) {
      // 2. Make a request to your server
      return actions.request.post('/api/execute-payment/', {
        paymentID: data.paymentID,
        payerID:   data.payerID
      })
        .then(function(res) {
          // 3. Show the buyer a confirmation message.
        });
    }
  }, '#paypal-button');
</script>
</script>

@endsection
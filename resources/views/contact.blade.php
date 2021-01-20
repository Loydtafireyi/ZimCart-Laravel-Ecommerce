@extends('layouts.frontend')

<title>Contact</title>
<meta charset="UTF-8">
<meta name="description" content="Login">
<meta name="keywords" content="login, sign">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 100%;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>

@section('css')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Contact</h4>
			<div class="site-pagination">
				<a href="/">Home</a> /
				<a href="">Contact</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Contact section -->
	<section class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 contact-info">
					<h3>Get in touch</h3>
					<p>{{ $info->address }}</p>
					<p>{{ $info->tel }}</p>
					<p>{{ $info->email }}</p>
					<!-- flash success messages -->
					@if(Session::has('success'))
						<div class="alert alert-primary" role="alert">
							{{ Session::get('success') }}
						</div>
					@endif
					<!-- contact form area -->
					<form action="{{ route('store-contact') }}" method="post" class="contact-form">
						@csrf
						<!-- name -->
						<input type="text" name="name" 
							class="form-control @error('name') is-invalid @enderror" 
							id="name" placeholder="Your name" 
							value="{{ old('name') }}"
						>
						<!-- email -->
						<input type="text" name="email" 
							class="form-control @error('email') is-invalid @enderror"
							id="email" placeholder="Your e-mail" 
							value="{{ old('email') }}"
						 >
						<!-- subject -->
						<input type="text" name="subject" 
							class="form-control @error('subject') is-invalid @enderror" 
							id="subject" placeholder="Subject" 
							value="{{ old('subject') }}"
						>
						<!-- message -->
						<textarea name="message" 
							class="form-control @error('message') is-invalid @enderror" 
							id="message" 
							placeholder="Message">{{ old('message') }}</textarea>
						<!-- google recaptcha -->
						@if(config('services.recaptcha.key'))
			                <div class="form-group">
			                    <div class="g-recaptcha"
			                    data-sitekey="{{config('services.recaptcha.key')}}">
			                    </div>
			                    @error('g-recaptcha-response')
			                        <span class="invalid-feedback mt-3" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                    @enderror
			                </div>
			            @endif
						<button type="submit" class="site-btn">SEND NOW</button>
					</form>
				</div>
			</div>
		</div>
		<div class="map">
			<div id="map"></div>
		</div>
	</section>
	<!-- Contact section end -->


	<!-- Related product section -->
	<section class="related-product-section spad">
		<div class="container">
			<div class="section-title">
				<h2>Your Favorites</h2>
			</div>
			<div class="row">
				@foreach($products as $p)
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							@if($p->on_sale == 1)
	                        	<div class="tag-sale">ON SALE</div>
	                        @endif
	                        @if($p->is_new == 1)
	                        	<div class="tag-new">New</div>
	                        @endif
							<a href="{{ route('single-product', $p->slug) }}">
								@if($p->photos->count() > 0)
	                                <img src="/storage/{{ $p->photos->first()->images }}" alt="">
	                            @else
	                                <img src="{{ asset('frontend/img/no-image.png') }}" alt="">
	                            @endif
							</a>
							<div class="pi-links">
								<form action="{{ route('cart.store') }}" method="post">
	                                @csrf
	                                <input type="hidden" name="id" value="{{$p->id}}">
	                                <input type="hidden" name="name" value="{{$p->name}}">
	                                <input type="hidden" name="price" value="{{$p->price}}">
	                                <input type="hidden" name="quantity" value="1">
	                                <button type="submit" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></button>
	                            </form>
	                            <form action="{{ route('wishlist.store') }}" method="post">
	                                @csrf
	                                <input type="hidden" name="id" value="{{$p->id}}">
	                                <input type="hidden" name="name" value="{{$p->name}}">
	                                <input type="hidden" name="price" value="{{$p->price}}">
	                                <input type="hidden" name="quantity" value="1">
	                                <button type="submit" class="wishlist-btn"><i class="flaticon-heart"></i></button>
	                            </form>
							</div>
						</div>
						<div class="pi-text">
							<h6>${{ $p->price }}</h6>
							<p>{{ $p->name }}</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- Related product section end -->

@endsection

@section('scripts')

	<script>
	// Initialize and add the map -17.819069, 31.078772
	function initMap() {
	  // The location of Uluru
	  var uluru = {lat: -17.819069, lng: 31.078772};
	  // The map, centered at Uluru
	  var map = new google.maps.Map(
	      document.getElementById('map'), {zoom: 10, center: uluru});
	  // The marker, positioned at Uluru
	  var marker = new google.maps.Marker({position: uluru, map: map});
	}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap">
    </script>
  </body>
</html>

@endsection

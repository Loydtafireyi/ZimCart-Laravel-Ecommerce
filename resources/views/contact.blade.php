@extends('layouts.frontend')

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
	
					@if(Session::has('success'))
						<div class="alert alert-primary" role="alert">
							{{ Session::get('success') }}
						</div>
					@endif
					<form action="{{ route('store-contact') }}" method="post" class="contact-form">
						@csrf
						<input type="text" name="name" id="name" placeholder="Your name">
						<input type="text" name="email" id="email" placeholder="Your e-mail">
						<input type="text" name="subject" id="subject" placeholder="Subject">
						<textarea name="message" id="message" placeholder="Message"></textarea>
						<button type="submit" class="site-btn">SEND NOW</button>
					</form>
				</div>
			</div>
		</div>
		<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14376.077865872314!2d-73.879277264103!3d40.757667781624285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1546528920522" style="border:0" allowfullscreen></iframe></div>
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
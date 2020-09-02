@extends('layouts.frontend')

@section('seo')

<title>{{ $product->name }} | {{ $systemName->name }}</title>
<meta charset="UTF-8">
<meta name="description" content="{{ $product->meta_description }}">
<meta name="keywords" content="{{ $product->meta_keywords }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@endsection

@section('content')

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>{{ $product->category->name }}</h4>
			<div class="site-pagination">
				<a href="{{ route('welcome') }}">Home</a> /
				<a href="">Shop</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="{{ route('frontendCategories') }}"> &lt;&lt; Back to Categories</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="/storage/{{ $singleImage->images }}" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							@foreach($product->photos as $image)
								<div class="pt active" data-imgbigurl="/storage/{{ $image->images }}"><img src="/storage/{{ $image->images }}" alt=""></div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title">{{ $product->name }}</h2>
					<h3 class="p-price">${{ $product->price }}</h3>
					@if($pieces)
						<h4 class="p-stock">Pieces: 
							<span>
								{{ $pieces->attribute_value }}
							</span>
						</h4>
					@endif
					<h4 class="p-stock">Availability: 
						<span>
							@if($product->inStock())
								In Stock
							@else
								Out Of Stock
							@endif
						</span>
					</h4>
					<!-- Add to cart logic -->
					<form action="{{ route('cart.store') }}" method="post">
						@csrf
					@if($color->has('attribute_value'))
						<div class="fw-size-choose">
							<p>Color</p>
							@foreach($color as $c)
								<div class="sc-item">
									<input type="radio" name="Color" id="{{ $c->attribute_value }}" value="{{ $c->attribute_value }}">
									<label for="{{ $c->attribute_value }}" class="choose-color">{{ $c->attribute_value }}</label>
								</div>
							@endforeach
						</div>
					@endif

					@if($sizes->has('attribute_value'))
						<div class="fw-size-choose">
							<p>Sizes</p>
							@foreach($sizes as $size)
								<div class="sc-item">
									<input type="radio" name="Size" id="{{ $size->attribute_value }}" value="{{ $size->attribute_value }}">
									<label for="{{ $size->attribute_value }}">{{ $size->attribute_value }}</label>
								</div>
							@endforeach
						</div>
					@endif

                    
						<div class="quantity">
							<p>Quantity</p>
	                        <div class="pro-qty"><input type="text" name="quantity" value="1"></div>
	                    </div>
						<input type="hidden" name="id" value="{{ $product->id }}">
						<input type="hidden" name="name" value="{{ $product->name }}">
						<input type="hidden" name="price" value="{{ $product->price }}">
						<button type="submit" class="site-btn">Add To Cart</button>
					</form>

					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Description</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>{{ $product->description }}</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 Days Returns</h4>
									<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
						<a href=""><i class="fa fa-instagram"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>RELATED PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach($relatedProducts as $related)
				<div class="product-item">
					<div class="pi-pic">
						<a href="{{ route('single-product', $related->slug) }}">
							<img src="/storage/{{ $related->photos->first()->images }}" alt="">
						</a>
						<div class="pi-links">
							<form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$related->id}}">
                                <input type="hidden" name="name" value="{{$related->name}}">
                                <input type="hidden" name="price" value="{{$related->price}}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></button>
                            </form>
                            <form>
                                <button type="submit" class="wishlist-btn"><i class="flaticon-heart"></i></button>
                            </form>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->

@endsection
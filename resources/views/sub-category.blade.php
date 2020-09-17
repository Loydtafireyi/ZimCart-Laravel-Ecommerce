@extends('layouts.frontend')

@section('seo')

<title>{{ $subCategory->name }} | Product Category</title>
<meta charset="UTF-8">
<meta name="description" content="{{ $subCategory->name }}">
<meta name="keywords" content="{{ $subCategory->name }}, {{ $subCategory->name }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@endsection

@section('content')

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>{{ $subCategory->name }}</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Categories</h2>
						<ul class="category-menu">
							@foreach($categories as $cat)
								<li><a href="{{ route('frontendCategory', $cat->slug) }}">{{ $cat->name }}</a>
									@if($cat->subcategories->count() > 0)
									<ul class="sub-menu">
										@foreach($cat->subcategories as $sub)
											<li><a href="{{ route('subcategory', $sub->slug) }}">{{ $sub->name }}<span>({{ $sub->products->count() }})</span></a></li>
										@endforeach
									</ul>
									@endif
								</li>
							@endforeach
						</ul>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">refine by</h2>
						<div class="price-range-wrap">
							<h4>Price</h4>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="270">
								<div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
								</span>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
								</span>
							</div>
							<div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						@foreach($products as $p)
						<div class="col-lg-4 col-sm-6">
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
			                                <img src="/storage/{{ $p->photos->first()->images }} " alt="">
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
									<h6>${{$p->price}}</h6>
									<p>{{$p->name}}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					{{ $products->links() }}
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->

@endsection
@extends('layouts.frontend')

@section('seo')

<title>
	@if(auth()->check()) 
		{{ auth()->user()->name }} 's Orders
	@endif
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@endsection

@section('content')

	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
					<h3>Order {{ $order->order_number }} 
						<strong class="text-uppercase text-danger">{{ $order->status }}</strong>
					</h3>
					<div class="cart-table-warp">
						<table>
						<thead>
							<tr>
								<th class="product-th">Product</th>
								<th class="size-th">Quantity</th>
								<th class="size-th">Code</th>
								<th class="total-th">Price</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $p)
							<tr>
								<td class="product-col">
									{{-- @if($p->model->photos->count() > 0)
		                               <img src="/storage/{{ $p->pivot->photos->first()->images }}" alt="">
		                            @else --}}
		                             {{--    <img src="{{ asset('frontend/img/no-image.png') }}" alt="">
		                            @endif --}}
									<div class="pc-title">
										<h4>{{ $p->name }}</h4>
										<p>${{ $p->price }}</p>
									</div>
								</td>
								<td class="size-col"><h4>{{ $p->pivot->quantity }}</h4></td>
								<td class="size-col"><h4>{{ $p->code }}</h4></td>
								<td class="total-col"><h4>${{ $p->price * $p->pivot->quantity }}</h4></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
					<div class="total-cost">
						<h6>Order Total <span>${{ $order->billing_total }}</span></h6>
					</div>
				</div>
				</div>
				<div class="col-lg-4 card-right">
					<a href="" class="site-btn">Profile Settings</a>
					<a href="" class="site-btn sb-dark">Continue shopping</a>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->

	<!-- Related product section -->
<section class="related-product-section">
	<div class="container">
		<div class="section-title text-uppercase">
			<h2>You Also Viewed</h2>
		</div>
		<div class="row">
			@foreach($recentlyViewed as $view)
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<div class="tag-new">New</div>
						<a href="{{ route('single-product', $view->slug) }}">
							@if($view->photos->count() > 0)
                                <img src="/storage/{{ $view->photos->first()->images }}" alt="">
                            @else
                                <img src="{{ asset('frontend/img/no-image.png') }}" alt="">
                            @endif
						</a>
						<div class="pi-links">
							<form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$view->id}}">
                                <input type="hidden" name="name" value="{{$view->name}}">
                                <input type="hidden" name="price" value="{{$view->price}}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></button>
                            </form>
                            <form>
                                <button type="submit" class="wishlist-btn"><i class="flaticon-heart"></i></button>
                            </form>
						</div>
					</div>
					<div class="pi-text">
						<h6>${{ $view->price }}</h6>
						<p>{{ $view->name }}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- Related product section end -->

@endsection
@extends('layouts.frontend')

@section('seo')

<title>
	@if(auth()->check()) 
		{{ auth()->user()->name }} 's Wishlist
	@else
		Wishlist
	@endif
</title>
<meta charset="UTF-8">
<meta name="description" content="{{ $systemInfo->description }}">
<meta name="keywords" content="{{ $systemInfo->description }}, {{ $systemInfo->description }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@endsection

@section('content')

<!-- cart section end -->
<section class="cart-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="cart-table">
					<h3>Your Wishlist</h3>
					<div class="cart-table-warp">
						<table>
						<thead>
							<tr>
								<th class="product-th">Product</th>
								<th class="quy-th">Quantity</th>
								<th class="size-th">Size</th>
								<th class="total-th">Price</th>
							</tr>
						</thead>
						<tbody>
							@foreach(Cart::instance('wishlist')->content() as $item)
							<tr>
								<td class="product-col">
									<a href="{{ route('single-product', $item->model->slug) }}">
										@if($item->model->photos->count() > 0)
			                               <img src="/storage/{{ $item->model->photos->first()->images }}" alt="">
			                            @else
			                                <img src="{{ asset('frontend/img/no-image.png') }}" alt="">
			                            @endif
									</a>
									<div class="pc-title">
										<h4>{{ $item->model->name }}</h4>
										<p>${{ $item->model->price }}</p>
									</div>
								</td>
								<td class="quy-col">
									<div class="quantity">
										<form action="{{ route('cart.update', $item->rowId) }}" method="post">
											@csrf
											@method('PATCH')
											<div class="pro-qty">
												<input type="text" name="quantity" value="{{$item->qty}}">
											</div>
											<button style="border: none;">
												<i class="cancel fas fa-check ml-2" title="Update Product Qty" style="cursor: pointer; color: #00FF00;"></i>
											</button>
										</form>
                					</div>
								</td>
								<td class="size-col"><h4>{{ $item->size }}</h4></td>
								<td class="total-col"><h4>${{ $item->subtotal }}</h4></td>
								<td class="total-col">
									<form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
										@csrf
										@method('DELETE')
										<button style="border: none;">
											<i class="cancel fas fa-times" title="Remove Product" style="cursor: pointer; color: #f51167;"></i>
										</button>
									</form>
								</td>
							</tr>
							@endforeach
							@if(session()->get('coupon') != null)
							<tr>
								<td>Discount ({{session()->get('coupon')['name']}})</td>
								<td>
									<form action="{{ route('coupons.destroy') }}" method="post">
										@csrf
										@method('DELETE')
										<button style="border: none;">
											<i class="cancel fas fa-times" title="Remove coupon" style="cursor: pointer; color: #f51167;"></i>
										</button>
									</form>
								</td>
								<td></td>
								<td>- ${{session()->get('coupon')['discount']}}</td>
							</tr>
							<tr>
								<td><strong>New Subtotal</strong></td>
								<td></td>
								<td></td>
								<td><strong>$ {{$newSubtotal}}</strong></td>
							</tr>
							@endif
						</tbody>
					</table>
					</div>
					<div class="total-cost">
						<h6>Total <span>{{ Cart::instance('wishlist')->total() }}</span></h6>
					</div>
				</div>
			</div>
			<div class="col-lg-4 card-right">
				<a href="{{ route('checkout.index') }}" class="site-btn">Proceed to checkout</a>
				<a href="{{ route('frontendCategories') }}" class="site-btn sb-dark">Continue shopping</a>
			</div>
		</div>
	</div>
</section>
<!-- cart section end -->

<!-- Related product section -->
<section class="related-product-section">
	<div class="container">
		<div class="section-title text-uppercase">
			<h2>Might Also Like</h2>
		</div>
		<div class="row">
			@foreach($mightAlsoLike as $like)
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						@if($like->on_sale == 1)
                        <div class="tag-sale">ON SALE</div>
                        @endif
                        @if($like->is_new == 1)
                        <div class="tag-new">New</div>
                        @endif
						<a href="{{ route('single-product', $like->slug) }}">
							@if($like->photos->count() > 0)
                                <img src="/storage/{{ $like->photos->first()->images }}" alt="">
                            @else
                                <img src="{{ asset('frontend/img/no-image.png') }}" alt="">
                            @endif
						</a>
						<div class="pi-links">
							<form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$like->id}}">
                                <input type="hidden" name="name" value="{{$like->name}}">
                                <input type="hidden" name="price" value="{{$like->price}}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></button>
                            </form>
                            <form>
                                <button type="submit" class="wishlist-btn"><i class="flaticon-heart"></i></button>
                            </form>
						</div>
					</div>
					<div class="pi-text">
						<h6>${{ $like->price }}</h6>
						<p>{{ $like->name }}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- Related product section end -->

@endsection

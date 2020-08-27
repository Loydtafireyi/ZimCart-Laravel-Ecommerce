@extends('layouts.frontend')


@section('content')

<!-- cart section end -->
<section class="cart-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="cart-table">
					<h3>Your Cart</h3>
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
							@foreach(Cart::content() as $item)
							<tr>
								<td class="product-col">
									<a href="{{ route('single-product', $item->model->slug) }}">
										<img src="/storage/{{ $item->model->photos->first()->images }}" alt="">
									</a>
									<div class="pc-title">
										<h4>{{ $item->model->name }}</h4>
										<p>${{ $item->model->price }}.00</p>
									</div>
								</td>
								<td class="quy-col">
									<div class="quantity">
				                        <div class="pro-qty">
											<input type="text" value="1">
										</div>
                					</div>
								</td>
								<td class="size-col"><h4>{{ $item->size }}</h4></td>
								<td class="total-col"><h4>${{ $item->model->price }}.00</h4></td>
								<td class="total-col">
									<form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
										@csrf
										@method('DELETE')
										<button style="border: none;">
											<i class="cancel fas fa-times" title="remove" style="cursor: pointer;"></i>
										</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
					<div class="total-cost">
						<h6>Total <span>{{ Cart::total() }}</span></h6>
					</div>
				</div>
			</div>
			<div class="col-lg-4 card-right">
				<form class="promo-code-form">
					<input type="text" placeholder="Enter promo code">
					<button>Submit</button>
				</form>
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
						<div class="tag-new">New</div>
						<a href="{{ route('single-product', $like->slug) }}">
							<img src="/storage/{{ $like->photos->first()->images }}" alt="">
						</a>
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
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
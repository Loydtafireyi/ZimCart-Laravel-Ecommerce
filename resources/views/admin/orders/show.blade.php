@extends('layouts.app')

@section('content')

<!-- breadcrumb -->
<nav area-label="breadcrumb">

	<ol class="breadcrumb">
		<a href="{{ route('home') }}" class="text-decoration-none mr-3">
			<li class="breadcrumb-item">Home</li>
		</a>
		<li class="breadcrumb-item active">{{ $order->billing_fullname }}'s Order</li>
	</ol>

	<div class="card">
		<div class="card-header">{{ $order->order_number }} <strong class="ml-5">Worth ${{ $order->billing_total }}</strong></div>
		<div class="card-body">
			<h4>Products Ordered</h4>
			<table class="table table-bordered table-responsive table-dark">
				<thead>
					<th>Product Code</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Product Qty</th>
				</thead>
				<tbody>
					@foreach($products as $p)
					<tr>
						<td>{{$p->code}}</td>
						<td>{{$p->name}}</td>
						<td>{{$p->price}}</td>
						<td>{{$p->pivot->quantity}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<h4>Customer Information</h4>
			<table class="table table-bordered table-responsive table-success">
				<thead>
					<th>Customer Name</th>
					<th>Customer Phone</th>
					<th>Customer Address</th>
					<th>Customer City</th>
					<th>Customer Notes</th>
				</thead>
				<tbody>
					<tr>
						<td>{{$order->billing_fullname}}</td>
						<td>{{$order->billing_phone}}</td>
						<td>{{$order->billing_address}}</td>
						<td>{{$order->billing_city}}</td>
						<td>{{$order->notes}}</td>
					</tr>
				</tbody>
			</table>
			<h4>Order Status <strong  class="text-capitalize text-danger">{{ $order->status }}</strong></h4>
			<form action="{{ route('orders.update', $order->id) }}" method="post">
				@csrf
				@method('PATCH')
				<div class="form-group">
					<label for="status">Update Order Status</label>
					<select class="form-control" name="status">
						<option class="text-capitalize" value="{{ $order->status }}">{{ $order->status }}</option>
						<option value="pending">Pending</option>
						<option value="processing">Processing</option>
						<option value="shipped">Shipped</option>
						<option value="delivered">Delivered</option>
						<option value="pending">Pending</option>
					</select>
				</div>
				<div class="form-group">
					<button class="btn btn-danger">Update Status</button>
				</div>
			</form>
		</div>
	</div>
	
</nav>

@endsection

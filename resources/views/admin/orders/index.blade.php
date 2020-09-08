@extends('layouts.app')

@section('content')

<!-- breadcrumb -->
<nav area-label="breadcrumb">

	<ol class="breadcrumb">
		<a href="{{ route('home') }}" class="text-decoration-none mr-3">
			<li class="breadcrumb-item">Home</li>
		</a>
		<li class="breadcrumb-item active">Orders</li>
	</ol>
	
</nav>

<div class="card">
    <div class="card-header">Orders</div>

    <div class="card-body">

        <table class="table table-bordered table-hover table-dark table-responsive">
        	<thead>
        		<th>Name</th>
        		<th>Phone</th>
        		<th>Address</th>
        		<th>City</th>
        		<th>Amount</th>
        		<th>Pay Method</th>
        		<th>Status</th>
        		<th>Check</th>
        	</thead>
        	<tbody>
        		@foreach($orders as $order)
        		<tr>
        			<td>{{ $order->billing_fullname }}</td>
        			<td>{{ $order->billing_phone }}</td>
        			<td>{{ $order->billing_address }}</td>
        			<td>{{ $order->billing_city }}</td>
        			<td>${{ $order->billing_total }}</td>
        			<td>{{ $order->payment_method }}</td>
        			<td>{{ $order->status }}</td>
        			<td>
        				<a href="{{ route('orders.show', $order->id) }}" class="btn btn-success btn-sm">View Order</a>
        			</td>
        		</tr>
        		@endforeach
        	</tbody>
        </table>

    </div>
</div>

@endsection
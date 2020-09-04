@extends('layouts.app')

@section('content')

<!-- breadcrumb -->
<nav area-label="breadcrumb">

	<ol class="breadcrumb">
		<a href="{{ route('home') }}" class="text-decoration-none mr-3">
			<li class="breadcrumb-item">Home</li>
		</a>
		<li class="breadcrumb-item active">Coupons</li>
	</ol>
	
</nav>

<div class="card">
	<div class="card-header d-flex justify-content-between btn-sm">
		<span>Coupons</span>
		<a href="{{ route('coupon.create') }}" class="btn btn-dark">Add Coupons</a>
	</div>
	<div class="card-body">
		<table class="table table-dark table-bordered">
			<thead>
				<th>Type</th>
				<th>Code</th>
				<th>Value</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@foreach($coupons as $coupon)
				<tr class="text-capitalize">
					<td> {{ $coupon->type }} </td>
					<td> {{ $coupon->code }} </td>
					<td> {{ $coupon->value ?? $coupon->percent_off }} </td>
					<td>
						<a href="{{ route('coupon.edit', $coupon->id) }}" class="btn btn-sm btn-primary">Edit</a>
					</td>
					<td>
						<form action="{{ route('coupon.destroy', $coupon->id) }}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-sm btn-danger">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">{{ isset($coupon) ? 'Update Coupon' : 'Add Coupon'}}</div>
	<div class="card-body">
		<form action="{{ isset($coupon) ? route('coupon.update', $coupon->id) : route('coupon.store') }}" method="post">
			@csrf
			@if(isset($coupon))
				@method('PATCH')
			@endif
			<div class="form-group">
				<label for="code">Coupon Type</label>
				<select name="type" class="custom-select">
					<option value="percent">Percent Off</option>
					<option value="fixed">Fixed Amount</option>
				</select>
			</div>
			<div class="form-group">
				<label for="code">Coupon Code</label>
				<input type="text" name="code" class="form-control" value="{{ isset($coupon) ? $coupon->code : 'Add Coupon'}}">
			</div>
			<div class="form-group">
				<label for="code">Coupon Value</label>
				<input type="text" name="value" class="form-control" value="{{ isset($coupon) ? $coupon->value : 'Add Coupon'}}">
			</div>	
			<div class="form-group">
				<button type="submit" class="btn btn-primary">{{ isset($coupon) ? 'Update Coupon' : 'Add Coupon'}}</button>
			</div>	
		</form>
	</div>
</div>

@endsection
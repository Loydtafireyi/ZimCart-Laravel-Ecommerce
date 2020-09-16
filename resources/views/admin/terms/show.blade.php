@extends('layouts.app')

@section('content')

<!-- breadcrumb -->
<nav area-label="breadcrumb">

	<ol class="breadcrumb">
		<a href="{{ route('home') }}" class="text-decoration-none mr-3">
			<li class="breadcrumb-item">Home</li>
		</a>
		<li class="breadcrumb-item active">Terms & Condtions</li>
	</ol>
	
</nav>

<div class="card">
	<div class="card-header d-flex justify-content-between btn-sm">
		<span class="mt-2"><h4>Terms & Conditions</h4></span>
		<a href="{{ isset($term) ? route('terms.edit', $term->id) : route('terms.create') }}" class="btn btn-dark">{{ isset($term) ? 'Edit Terms' : 'Add Terms' }}</a>
	</div>

	<div class="card-body">
		@if(isset($term))
			<div class="form-group">
				<input type="text" class="form-control" placeholder="eg Zimcart Terms & Conditions" value="{!! $term->heading !!}" readonly="">
			</div>
			<div>{!! $term->terms !!}</div>
		@else
			<div class="text-center">
				<h3>Please add Terms and Conditions to use services like Facebook login & Google login</h3>
			</div>
		@endif
	</div>
</div>

@endsection
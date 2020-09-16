@extends('layouts.app')

@section('content')

<!-- breadcrumb -->
<nav area-label="breadcrumb">

	<ol class="breadcrumb">
		<a href="{{ route('home') }}" class="text-decoration-none mr-3">
			<li class="breadcrumb-item">Home</li>
		</a>
		<li class="breadcrumb-item active">Privacy Policy</li>
	</ol>
	
</nav>

<div class="card">
	<div class="card-header d-flex justify-content-between btn-sm">
		<span class="mt-2"><h4>Privacy Policy</h4></span>
		<a href="{{ isset($policy) ? route('privacy.edit', $policy->id) : route('privacy.create') }}" class="btn btn-dark">{{ isset($policy) ? 'Edit Terms' : 'Add Terms' }}</a>
	</div>

	<div class="card-body">
		@if(isset($policy))
			<div class="form-group">
				<input type="text" class="form-control" placeholder="eg Zimcart Privacy Policy" value="{!! $policy->heading !!}" readonly="">
			</div>
			<div>{!! $policy->policy !!}</div>
		@else
			<div class="text-center">
				<h3>Please add Privacy Policy to use services like Facebook login & Google login</h3>
			</div>
		@endif
	</div>
</div>

@endsection
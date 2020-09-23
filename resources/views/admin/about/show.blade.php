@extends('layouts.app')

@section('content')

<!-- breadcrumb -->
<nav area-label="breadcrumb">

	<ol class="breadcrumb">
		<a href="{{ route('home') }}" class="text-decoration-none mr-3">
			<li class="breadcrumb-item">Home</li>
		</a>
		<li class="breadcrumb-item active">About Information</li>
	</ol>
	
</nav>

<div class="card">
	<div class="card-header d-flex justify-content-between btn-sm">
		<span class="mt-2"><h4>About Information</h4></span>
		<a href="{{ isset($about) ? route('about.edit', $about->id) : route('about.create') }}" class="btn btn-dark">{{ isset($about) ? 'Edit about' : 'Add about' }}</a>
	</div>

	<div class="card-body">
		@if(isset($about))
			<div class="form-group">
				<input type="text" class="form-control" placeholder="eg Zimcart abouts & Conditions" value="{!! $about->heading !!}" readonly="">
			</div>
			<div>{!! $about->about !!}</div>
		@else
			<div class="text-center">
				<h3>Add about information to let your customers learn  more about you!</h3>
			</div>
		@endif
	</div>
</div>

@endsection
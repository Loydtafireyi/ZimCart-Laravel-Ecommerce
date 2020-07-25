@extends('layouts.app')

@section('content')


<div class="card">
	<div class="card-header">System Settings</div>
	<div class="card-body">
		<form action="{{ route('system-settings.update', $setting->slug) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PATCH')
			<!-- Company name -->
			<div class="form-group">
				<label for="name">Comapny Name</label>
				<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $setting->name }}">

				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong> {{ $message }} </strong>
					</span>
				@enderror
			</div>
			<!-- Company logo -->
			@if(isset($setting))
				<img src="/storage/{{$setting->logo}}" style="width: 50%">
			@endif
			<div class="form-group">
				<label for="logo">Comapny Logo</label>
				<input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" value="{{ $setting->name }}">

				@error('logo')
					<span class="invalid-feedback" role="alert">
						<strong> {{ $message }} </strong>
					</span>
				@enderror
			</div>	
			<!-- Company description -->
			<div class="form-group">
				<label for="description">Company Description</label>
				<textarea type="text" name="description" id="description" class="form-control">{{ $setting->description }}</textarea>
			</div>
			<!-- Company address -->
			<div class="form-group">
				<label for="address">Company Address</label>
				<input type="text" name="address" id="address" class="form-control" value="{{ $setting->address }}">
			</div>
			<!-- Company tel -->	
			<div class="form-group">
				<label for="tel">Company Phone</label>
				<input type="tel" name="tel" id="tel" class="form-control" value="{{ $setting->tel }}">
			</div>
			<!-- Company eamil -->
			<div class="form-group">
				<label for="email">Company Email</label>
				<input type="email" name="email" id="email" class="form-control" value="{{ $setting->email }}">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update Details</button>
			</div>
		</form>
	</div>
</div>

@endsection
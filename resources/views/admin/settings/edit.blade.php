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
				<img src="/storage/{{$setting->logo}}" style="width: 162px; height: 55px;">
			@endif
			<div class="form-group">
				<label for="logo">Company Logo</label>
				<input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" value="{{ $setting->name }}">

				@error('logo')
					<span class="invalid-feedback" role="alert">
						<strong> {{ $message }} </strong>
					</span>
				@enderror
			</div>
			<!-- Company favicon -->
			@if(isset($setting))
				<img src="/storage/{{$setting->favicon}}" style="width: 128px; height: 128px;">
			@endif
			<div class="form-group">
				<label for="favicon">Company Favicon</label>
				<input type="file" name="favicon" id="favicon" class="form-control @error('favicon') is-invalid @enderror" value="{{ $setting->name }}">

				@error('favicon')
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

			<!-- system seo start -->
			<div class="form-group">
				<label for="meta_description">System Meta Description</label>
				<textarea name="meta_description" class="form-control" placeholder="Make your web application visible on search engine by describing what you do...">{{ $setting->meta_description }}</textarea>
			</div>
			<div class="form-group">
				<label for="meta_keywords">System Meta Keywords</label>
				<input name="meta_keywords" class="form-control" placeholder="Seperate keywords using comma..." value="{{  $setting->meta_keywords }}">
			</div>
			<div class="form-group">
				<label for="facebook_pixel">Facebook Pixel</label>
				<input name="facebook_pixel" class="form-control" placeholder="Your Facebook Pixel ID eg AC-162735780-5" value="{{  $setting->facebook_pixel }}">
			</div>
			<div class="form-group">
				<label for="google_analytics">Google Analytics</label>
				<input name="google_analytics" class="form-control" placeholder="Your Google Analytics ID eg AC-162735780-5" value="{{  $setting->google_analytics }}">
			</div>
			<!-- system seo start -->

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update Details</button>
			</div>
		</form>
	</div>
</div>

@endsection
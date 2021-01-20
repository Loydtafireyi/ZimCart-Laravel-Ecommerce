@extends('layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
@endsection

@section('content')

<div class="card">
	<div class="card-header">{{ isset($about) ? 'Update about info' : 'Add about info' }}</div>
	<div class="card-body">
		<form action="{{ isset($about) ? route('about.update', $about->id) : route('about.store') }}" method="post">
			@csrf
			@if(isset($about))
				@method('PATCH')
			@endif
			<div class="form-group">
				<label for="Heading">Heading</label>
				<input type="text" name="heading" class="form-control" placeholder="eg About Zimcart" value="{{isset($about) ? $about->heading : ''}}">
			</div>

			<div class="form-group">
				<label for="about">About Infomation</label>
				<input name="about" type="hidden" id="about" rows="10" class="form-control" value="{{isset($about) ? $about->about : ''}}">
				<trix-editor input="about"></trix-editor>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">{{ isset($about) ? 'Update about info' : 'Add about info' }}</button>
			</div>
			
		</form>
	</div>
</div>	

@endsection

@section('scripts')
	<script src="{{ asset('js/trix.js') }}"></script>
@endsection
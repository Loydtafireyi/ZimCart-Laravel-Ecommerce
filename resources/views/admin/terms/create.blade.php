@extends('layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
@endsection

@section('content')

<div class="card">
	<div class="card-header">{{ isset($term) ? 'Update Terms & Conditions' : 'Add Terms & Conditions' }}</div>
	<div class="card-body">
		<form action="{{ isset($term) ? route('terms.update', $term->id) : route('terms.store') }}" method="post">
			@csrf
			@if(isset($term))
				@method('PATCH')
			@endif
			<div class="form-group">
				<label for="Heading">Heading</label>
				<input type="text" name="heading" class="form-control" placeholder="eg Zimcart Terms & Conditions" value="{{isset($term) ? $term->heading : ''}}">
			</div>

			<div class="form-group">
				<label for="terms">Terms & Conditions</label>
				<input name="terms" type="hidden" id="terms" rows="10" class="form-control" value="{{isset($term) ? $term->terms : ''}}">
				<trix-editor input="terms"></trix-editor>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">{{ isset($term) ? 'Update Terms & Conditions' : 'Add Terms & Conditions' }}</button>
			</div>
			
		</form>
	</div>
</div>	

@endsection

@section('scripts')
	<script src="{{ asset('js/trix.js') }}"></script>
@endsection
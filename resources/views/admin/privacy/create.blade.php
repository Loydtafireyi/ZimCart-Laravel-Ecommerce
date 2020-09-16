@extends('layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
@endsection

@section('content')

<div class="card">
	<div class="card-header">{{ isset($policy) ? 'Update Privacy Policy' : 'Add Privacy Policy' }}</div>
	<div class="card-body">
		<form action="{{ isset($policy) ? route('privacy.update', $policy->id) : route('privacy.store') }}" method="post">
			@csrf
			@if(isset($policy))
				@method('PATCH')
			@endif
			<div class="form-group">
				<label for="Heading">Heading</label>
				<input type="text" name="heading" class="form-control" placeholder="eg Zimcart Privacy Policy" value="{{isset($policy) ? $policy->heading : ''}}">
			</div>

			<div class="form-group">
				<label for="policy">Privacy Policy</label>
				<input name="policy" type="hidden" id="policy" rows="10" class="form-control" value="{{isset($policy) ? $policy->policy : ''}}">
				<trix-editor input="policy"></trix-editor>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">{{ isset($policy) ? 'Update Privacy Policy' : 'Add Privacy Policy' }}</button>
			</div>
			
		</form>
	</div>
</div>	

@endsection

@section('scripts')
	<script src="{{ asset('js/trix.js') }}"></script>
@endsection
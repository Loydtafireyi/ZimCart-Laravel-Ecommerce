@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header"> {{ isset($socialLinks) ? 'Update Links' : 'Add links' }} </div>
	<div class="card-body">
		<form action="{{ isset($socialLinks) ? route('social-links.update', $socialLinks->id) : route('social-links.store') }}" method="post">
			@csrf
			@if(isset($socialLinks))
				@method('PATCH')
			@endif
			
			<div class="form-group">
				<label for="facebook">Facebook Page Link</label>
				<input type="text" name="facebook" id="facebook" class="form-control" value="{{ isset($socialLinks) ? $socialLinks->facebook : '' }}">
			</div>
			<div class="form-group">
				<label for="instagram">Instagram Page Link</label>
				<input type="text" name="instagram" id="instagram" class="form-control" value="{{ isset($socialLinks) ? $socialLinks->instagram : '' }}">
			</div>
			<div class="form-group">
				<label for="pinterest">Pinterest Page Link</label>
				<input type="text" name="pinterest" id="pinterest" class="form-control" value="{{ isset($socialLinks) ? $socialLinks->pinterest : '' }}">
			</div>
			<div class="form-group">
				<label for="linkedin">LinkedIn Page Link</label>
				<input type="text" name="linkedin" id="linkedin" class="form-control" value="{{ isset($socialLinks) ? $socialLinks->linkedin : '' }}">
			</div>
			<div class="form-group">
				<label for="youtube">Youtube Page Link</label>
				<input type="text" name="youtube" id="youtube" class="form-control" value="{{ isset($socialLinks) ? $socialLinks->youtube : '' }}">
			</div>
			<div class="form-group">
				<label for="twitter">Twitter Page Link</label>
				<input type="text" name="twitter" id="twitter" class="form-control" value="{{ isset($socialLinks) ? $socialLinks->twitter : '' }}">
			</div>
			<div class="form-group">
				<label for="tiktok">Tiktok Page Link</label>
				<input type="text" name="tiktok" id="tiktok" class="form-control" value="{{ isset($socialLinks) ? $socialLinks->tiktok : '' }}">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">{{ isset($socialLinks) ? 'Update Links' : 'Add links' }}</button>
			</div>
		</form>
	</div>
</div>

@endsection
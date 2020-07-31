@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">Create Slide</div>
	<div class="card-body">
		<form action="{{ route('slides.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="image">Image Slider</label>
				<input type="file" name="image" id="image" class="form-control">
			</div>

			<div class="form-group">
				<label for="heading">Slider Heading</label>
				<input type="text" name="heading" id="heading" class="form-control">
			</div>

			<div class="form-group">
				<label for="description">Slider Heading</label>
				<input type="text" name="description" id="description" class="form-control">
			</div>

			<div class="form-group">
				<label for="link">Slider Link</label>
				<input type="text" name="link" id="link" class="form-control">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add Slider</button>
			</div>
		</form>
	</div>
</div>

@endsection
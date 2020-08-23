@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">{{ isset($slide) ? 'Update Slide' : 'Create Slide' }}</div>
	<div class="card-body">
		<form action="{{ isset($slide) ? route('slides.update', $slide->id) : route('slides.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			@if(isset($slide))
				@method('PATCH')
			@endif

			@if(isset($slide))
				<div class="form-group">
					<img src="/storage/{{$slide->image}}" style="max-width: 60%; height: 300px;">
				</div>
			@endif
			<div class="form-group">
				<label for="image">Image Slider</label>
				<input type="file" name="image" id="image" class="form-control">
			</div>

			<div class="form-group">
				<label for="heading">Slider Heading</label>
				<input type="text" name="heading" id="heading" class="form-control" value="{{ isset($slide) ? $slide->heading : '' }}">
			</div>

			<div class="form-group">
				<label for="description">Slider Description</label>
				<input type="text" name="description" id="description" class="form-control" value="{{ isset($slide) ? $slide->description : '' }}">
			</div>

			<div class="form-group">
				<label for="link">Slider Link</label>
				<input type="text" name="link" id="link" class="form-control" value="{{ isset($slide) ? $slide->link : '' }}">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">{{ isset($slide) ? 'Update Slider' : 'Add Slider' }}</button>
			</div>
		</form>
	</div>
</div>

@endsection
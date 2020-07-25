@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">
		{{ isset($category) ? "Edit $category->name" : 'Add Category' }}
	</div>
	<div class="card-body">
		<form action="{{ isset($category) ? route('categories.update', $category->slug) : route('categories.store') }}" method="POST">
			@csrf
			@if(isset($category))
				@method('PATCH')
			@endif
			<div class="row justify-content-start">
				
				<div class="form-group">
					<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Add Category" value="{{ isset($category) ? $category->name : '' }}">

					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				@if(isset($category))
					<div class="form-group ml-5">
						<input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Add Category" value="{{ isset($category) ? $category->slug : '' }}">

						@error('slug')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				@endif

				<div class="form-group ml-5">
					<button type="submit" class="btn btn-primary">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</button>
				</div>

			</div>
		</form>
	</div>
</div>

@endsection
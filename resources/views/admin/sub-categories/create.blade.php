@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">
		{{ isset($subCategory) ? "Edit $subCategory->name" : 'Add Sub-Category' }}
	</div>
	<div class="card-body">
		<form action="{{ isset($subCategory) ? route('subcategories.update', $subCategory->slug) : route('subcategories.store') }}" method="POST">
			@csrf
			@if(isset($subCategory))
				@method('PATCH')
			@endif
			<div class="row justify-content-start">

				<!-- product category -->
				<div class="form-group">
					<select name="category_id" id="category_id" class="form-control @error('category') is-invalid @enderror">
						<option>Choose A Category...</option>
						@foreach($categories as $cat)
							<option value="{{ $cat->id }}">{{ $cat->name }}</option>
						@endforeach
					</select>

					@error('category')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
				
				<div class="form-group ml-5">
					<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Add sub-category" value="{{ isset($subCategory) ? $subCategory->name : '' }}">

					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				@if(isset($category))
					<div class="form-group ml-5">
						<input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Add Category" value="{{ isset($subCategory) ? $subCategory->slug : '' }}">

						@error('slug')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				@endif

				<div class="form-group ml-5">
					<button type="submit" class="btn btn-primary">{{ isset($subCategory) ? 'Edit Sub-Category' : 'Add Sub-category' }}</button>
				</div>

			</div>
		</form>
	</div>
</div>

@endsection
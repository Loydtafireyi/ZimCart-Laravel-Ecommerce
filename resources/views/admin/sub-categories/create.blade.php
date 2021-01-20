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
					<select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
						@foreach($categories as $cat)
							<option value="{{ $cat->id }}">{{ $cat->name }}</option>
						@endforeach
					</select>

					@error('category_id')
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

				@if(isset($subCategory))
					<div class="form-group ml-5">
						<input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Add SubCategory" value="{{ isset($subCategory) ? $subCategory->slug : '' }}">

						@error('slug')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				@endif

				<div class="form-group ml-5">
					<button type="submit" class="btn btn-primary">{{ isset($subCategory) ? 'Edit Sub-Cat' : 'Add Sub-category' }}</button>
				</div>

			</div>
		</form>
	</div>
</div>

@endsection
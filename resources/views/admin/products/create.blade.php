@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">
		<h3>{{ isset($product) ? 'Update Product' : 'Add Product' }}</h3>
	</div>
	<div class="card-body">
		<!-- product images -->
		<div class="row justify-content-around">
			@if(isset($product))
					@foreach($product->photos as $image)
						<div class="form-group">
							<img src="/storage/{{ $image->images }}" style="width: 200px;">
							<form action="{{ route('destroyImage', $image->id) }}" method="post">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger mt-3">Delete Image</button>
							</form>
						</div>
					@endforeach
			@endif
		</div>
		<form action="{{ isset($product) ? route('products.update', $product->slug) : route('products.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			@if(isset($product))
				@method('PATCH')
			@endif
			<div class="row justify-content-between m-auto">
				<!-- product name -->
				<div class="form-group">
					<label for="name">Product Name</label>
					<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($product) ? $product->name :  old('name') }}">

					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
				<!-- product code -->
				<div class="form-group">
					<label for="code">Product Code</label>
					<input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ isset($product) ? $product->code : old('code') }}">

					@error('code')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
				<!-- product category -->
				<div class="form-group">
					<label for="category_id">Product Category</label>
					<select name="category_id" id="category_id" class="form-control @error('category') is-invalid @enderror">
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
				<!-- product sub-category -->
				<div class="form-group">
					<label for="sub_category_id">Sub-Category (Optional)</label>
					<select name="sub_category_id" id="sub_category_id" class="form-control @error('sub_category_id') is-invalid @enderror">
						@foreach($subCategories as $cat)
							<option value="{{ $cat->id }}">{{ $cat->name }}</option>
						@endforeach
					</select>

					@error('sub_category_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
			</div>
			<!-- product description -->
			<div class="form-group">
				<label for="description">Product Description</label>
				<textarea type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ isset($product) ? $product->description : old('description') }}</textarea>

				@error('description')
					<span class="invalid-feedback" role="alert">
						<strong>{{$message}}</strong>
					</span>
				@enderror
			</div>
			<div class="row justify-content-between m-auto">
				<!-- product images -->
				<div class="form-group">
					<label for="images">Product Image</label>
					<input type="file" name="images[]" id="images" class="form-control @error('images') is-invalid @enderror" multiple>

					@error('images')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
				<!-- product price -->
				<div class="form-group">
					<label for="price">Product Price</label>
					<input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ isset($product) ? $product->price : old('price') }}">

					@error('price')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
				<!-- product qty -->
				<div class="form-group">
					<label for="quantity">Product Quantity</label>
					<input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ isset($product) ? $product->quantity : old('quantity') }}">

					@error('quantity')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
			</div>

			<!-- products attributes start -->
			@livewire('attribute')
			
			<!-- products attributes end -->

			<!-- product add btn -->
			<div class="form-group">
				<button class="btn btn-primary">{{ isset($product) ? 'Update Product Details': 'Add Product' }}</button>
			</div>
		</form>
	</div>
</div>

@endsection
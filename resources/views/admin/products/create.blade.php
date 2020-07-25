@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">Add Product</div>
	<div class="card-body">
		<form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row justify-content-between m-auto">
				<!-- product name -->
				<div class="form-group">
					<label for="name">Product Name</label>
					<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">

					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
				<!-- product code -->
				<div class="form-group">
					<label for="code">Product Code</label>
					<input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror">

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
						<option>Select Category.....</option>
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
			</div>
			<!-- product description -->
			<div class="form-group">
				<label for="description">Product Description</label>
				<textarea type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror"></textarea>

				@error('description')
					<span class="invalid-feedback" role="alert">
						<strong>{{$message}}</strong>
					</span>
				@enderror
			</div>
			<!-- product images -->
			<div class="form-group">
				<label for="image">Product Image</label>
				<input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">

				@error('image')
					<span class="invalid-feedback" role="alert">
						<strong>{{$message}}</strong>
					</span>
				@enderror
			</div>
			<!-- product price -->
			<div class="row justify-content-between m-auto">
				<div class="form-group">
					<label for="price">Product Price</label>
					<input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror">

					@error('price')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
				<!-- product qty -->
				<div class="form-group">
					<label for="quantity">Product Quantity</label>
					<input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror">

					@error('quantity')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
			</div>
			<!-- product status -->
			<div class="form-group">
				<label for="status">Product Status</label>
				<input type="text" name="status" id="status" class="form-control @error('status') is-invalid @enderror">

				@error('status')
					<span class="invalid-feedback" role="alert">
						<strong>{{$message}}</strong>
					</span>
				@enderror
			</div>
			<!-- product add btn -->
			<div class="form-group">
				<button class="btn btn-primary">Add Product</button>
			</div>
		</form>
	</div>
</div>

@endsection
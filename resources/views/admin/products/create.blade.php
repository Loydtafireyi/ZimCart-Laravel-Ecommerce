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
		<!-- product attributes start-->
		@if(isset($attributes))
		    <table class="table table-dark table-bordered table-hover">
    			<thead>
    				<th>Attribute Name</th>
    				<th>Attribute Value</th>
    				<th>Delete</th>
    			</thead>
    			<tbody>
    				@foreach($attributes as $at)
    				<tr>
    					<td>{{ $at->attribute_name }}</td>
    					<td>{{ $at->attribute_value }}</td>
    					<td>
    						<form action="{{ route('destroyAttribute', $at->id) }}" method="post">
    							@csrf
    							@method('DELETE')
    							<button type="submit" class="btn btn-danger btn-sm">Delete</button>
    						</form>
    					</td>
    				</tr>
    				@endforeach
    			</tbody>
    		</table>
		@endif
		<!-- product attributes end-->
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
						@if(isset($product))
							<option selected value="{{$product->category->id}}">{{ $product->category->name }}</option>
						@endif
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
						@if($productSubCategory)
							<option selected value="{{$product->SubCategory->id}}">{{ $product->SubCategory->name }}</option>
						@endif
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
					<input type="decimal" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ isset($product) ? $product->price : old('price') }}">

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
			<!-- product status -->
			<div class="row ml-2">
				<!-- product on sale -->
				<div class="form-group">
					<label for="on_sale">On Sale</label>
					<select name="on_sale" id="on_sale" class="form-control @error('on_sale') is-invalid @enderror">
						<option value="0">NO</option>
						<option value="1">YES</option>
					</select>

					@error('on_sale')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
				<!-- product on sale -->
				<div class="form-group ml-5">
					<label for="is_new">New Product</label>
					<select name="is_new" id="is_new" class="form-control @error('is_new') is-invalid @enderror">
						<option value="0">NO</option>
						<option value="1">YES</option>
					</select>

					@error('is_new')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
			</div>
			<!-- product seo start -->
			<div class="form-group">
				<label for="meta_description">Product Meta Description</label>
				<textarea name="meta_description" class="form-control" placeholder="Make your product visible on search engine by describing your product...">{{ isset($product) ?  $product->meta_description : '' }}</textarea>
			</div>
			<div class="form-group">
				<label for="meta_keywords">Product Meta Keywords</label>
				<textarea name="meta_keywords" class="form-control" placeholder="Seperate keywords using comma...">{{ isset($product) ? $product->meta_keywords : '' }}</textarea>
			</div>
			<!-- product seo start -->

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
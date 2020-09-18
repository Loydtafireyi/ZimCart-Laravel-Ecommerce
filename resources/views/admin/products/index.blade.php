@extends('layouts.app')

@section('content')
<!-- breadcrumb -->
<nav area-label="breadcrumb">

	<ol class="breadcrumb">
		<a href="{{ route('home') }}" class="text-decoration-none mr-3">
			<li class="breadcrumb-item">Home</li>
		</a>
		<li class="breadcrumb-item active">{{ $products->count() }} Products</li>
	</ol>
	
</nav>
<!-- Upload multiple products -->
<div class="card mb-3">
	<div class="card-body">
		<form action="" method="post"  enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="form-group">
					<label>Upload Cases Excel/CSV Sheet</label>
					<input type="file" name="file" id="file" class="form-control @error('date_reported') is-invalid @enderror">

					@error('file')
						<div class="alert alert-danger mt-1" role="alert"></div>
						<span>{{$message}}</span>
					@enderror
				</div>
				<div class="form-group mt-4 ml-5">
					<button type="submit" class="btn btn-primary">Upload Excel File</button>
				</div>
			</div>
		</form>	
	</div>
</div>
<!-- Dispaly all products from DB -->
<div class="card">
	<div class="card-header d-flex justify-content-between">
		<span>{{ $products->count() }} Products</span>
		<livewire:admin.search-bar>
		<a href="{{ route('products.create') }}" class="btn btn-dark">Add Product</a>
	</div>
	<div class="card-body">
		<table class="table table-dark table-bordered table-responsive">
			<thead>
				<th>#</th>
				<th>Name</th>
				<th>Category</th>
				<th>Sub-Category</th>
				<th>Image</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@foreach($products as $index => $p)
				<tr>
					<td>{{ $index + 1 }}</td>
					<td>{{ $p->name }}</td>
					<td>{{ $p->category->name }}</td>
					<td>
						@if($p->sub_category_id != null)
						       {{ $p->subCategory->name ?? 'No subcategory' }}
						@else
						<p>N/A</p>
						@endif
					</td>
					<td>
						@if($p->photos->count() > 0)
                            <img src="/storage/{{ $p->photos->first()->images }}" style="border-radius: 100%; width: 25px; height: 25px;">
                        @else
                            <img src="{{ asset('frontend/img/no-image.png') }}" style="border-radius: 100%; width: 25px; height: 25px;">
                        @endif
					</td>
					<td>{{ $p->price }}</td>
					<td>{{ $p->quantity }}</td>
					<td>
						<a href="{{ route('products.edit', $p->slug) }}" class="btn btn-primary btn-sm">Edit</a>
					</td>
					<td>
						<form action="{{ route('products.destroy', $p->slug) }}" method="post">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger btn-sm">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<div class="pagination">
			{{ $products->links() }}
		</div>
	</div>
</div>

@endsection
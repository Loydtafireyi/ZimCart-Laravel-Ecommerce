@extends('layouts.app')

@section('content')

<nav area-label="breadcrumb">

	<ol class="breadcrumb">
		<a href="{{ route('home') }}" class="text-dectoration-none mr-3">
			<li class="breadcrumb-item">Home</li>
		</a>
		<li class="breadcrumb-item active">Categories</li>
	</ol>
	
</nav>

<div class="card">
	<div class="card-header d-flex justify-content-between">
		<span>Categories</span>
		<a href="{{ route('categories.create') }}" class="btn btn-dark">Add Category</a>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-dark">
			<thead>
				<th>#</th>
				<th>Category Name</th>
				<th>Slug</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@foreach($categories as $index => $cat)
				<tr>
					<td>{{ $index+1 }}</td>
					<td>{{ $cat->name }}</td>
					<td>{{ $cat->slug }}</td>
					<td><a href="{{ route('categories.edit', $cat->slug) }}" class="btn btn-primary btn-sm">Edit</a></td>
					<td>
						<form action="{{ route('categories.destroy', $cat->slug) }}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger btn-sm">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection
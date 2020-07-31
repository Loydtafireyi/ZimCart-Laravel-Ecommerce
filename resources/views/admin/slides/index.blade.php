@extends('layouts.app')

@section('content')
<!-- breadcrumb -->
<nav area-label="breadcrumb">

	<ol class="breadcrumb">
		<a href="{{ route('home') }}" class="text-decoration-none mr-3">
			<li class="breadcrumb-item">Home</li>
		</a>
		<li class="breadcrumb-item active">Products</li>
	</ol>
	
</nav>

<!-- Dispaly all slides from DB -->
<div class="card">
	<div class="card-header d-flex justify-content-between">
		<span>Slides</span>
		<a href="{{ route('slides.create') }}" class="btn btn-dark">Add Slide</a>
	</div>
	<div class="card-body">
		<table class="table table-dark table-bordered">
			<thead>
				<th>Heading</th>
				<th>Description</th>
				<th>Image</th>
				<th>Link</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@foreach($slides as  $slide)
				<tr>
					<td>{{ $slide->heading }}</td>
					<td>{{ $slide->description }}</td>
					<td>
						<img src="/storage/{{ $slide->image }}" style="border-radius: 100%; width: 25px; height: 25px;">
					</td>
					<td>{{ $slide->link }}</td>
					<td>
						<a href="{{ route('slides.edit', $slide->id) }}" class="btn btn-primary btn-sm">Edit</a>
					</td>
					<td>
						<form action="{{ route('slides.destroy', $slide->id) }}" method="post">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger btn-sm">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


@endsection
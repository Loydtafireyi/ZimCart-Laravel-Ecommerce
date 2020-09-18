@extends('layouts.app')

@section('content')

<!-- breadcrumb -->
<nav area-label="breadcrumb">

	<ol class="breadcrumb">
		<a href="{{ route('home') }}" class="text-decoration-none mr-3">
			<li class="breadcrumb-item">Home</li>
		</a>
		<li class="breadcrumb-item active">Social Links</li>
	</ol>
	
</nav>

<div class="card">
	<div class="card-header d-flex justify-content-between btn-sm">
		<span class="mt-2"><h4>Social Links</h4></span>
		<a href="{{ isset($socialLinks) ? route('social-links.edit', $socialLinks->id) : route('social-links.create') }}" class="btn btn-dark">{{ isset($socialLinks) ? 'Edit Social Links' : 'Add Social Links' }}</a>
	</div>
	<div class="card-body">
		@if($socialLinks != null)
		<table class="table table-dark table-bordered">
			<thead>
				<th>Platform</th>
				<th>Page Link</th>
			</thead>
			<tbody>
				<tr>
					<td>TikTok</td>
					<td> {{ $socialLinks->tiktok }} </td>
				</tr>
				<tr>
					<td>Instagram</td>
					<td> {{ $socialLinks->instagram }} </td>
				</tr>
				<tr>
					<td>Pinterest</td>
					<td> {{ $socialLinks->pinterest }} </td>
				</tr>
				<tr>
					<td>LinkedIn</td>
					<td> {{ $socialLinks->linkedin }} </td>
				</tr>
				<tr>
					<td>Youtube</td>
					<td> {{ $socialLinks->youtube }} </td>
				</tr>
				<tr>
					<td>Twitter</td>
					<td> {{ $socialLinks->twitter }} </td>
				</tr>
				<tr>
					<td>Facebook</td>
					<td> {{ $socialLinks->facebook }} </td>
				</tr>
			</tbody>
		</table>
		@endif
	</div>
</div>

@endsection
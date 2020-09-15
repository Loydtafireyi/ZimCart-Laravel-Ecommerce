@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">Add Terms & Conditions</div>
	<div class="card-body">
		<form action="{{ route('terms.store') }}" method="post">
			@csrf
			<div class="form-group">
				<label for="Heading">Heading</label>
				<input type="text" name="heading" class="form-control" placeholder="eg Zimcart Terms & Conditions">
			</div>

			<div class="form-group">
				<label for="terms">Terms & Conditions</label>
				<textarea name="terms" rows="10" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Save Terms</button>
			</div>
			
		</form>
	</div>
</div>	

@endsection
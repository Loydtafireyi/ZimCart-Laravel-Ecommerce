@extends('layouts.frontend')

@section('content')

<h4 class="title text-center mt-5 mb-3"> {{ $about->heading }} </h4>

<div class="card col-lg col-xl-9 flex-row mx-auto px-0">
	<div class="p-3 m-3"> {!!$about->about!!} </div>
</div>

@endsection
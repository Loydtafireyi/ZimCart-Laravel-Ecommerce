<div class="col-md-5">
    <input wire:model="search" type="text" name="" class="form-control rounded text-center position-relative" placeholder="Search Products">
    @if(strlen($search) > 2)
    	@if($searchResults->count() > 0)
	    <ul class="list-group position-absolute mt-2 ml-1 col-md-11">
	    	@foreach($searchResults as $result)
	    	<li class="list-group-item  bg-primary border-bottom">
	    		<a href="{{ route('products.edit', $result->slug) }}" class="d-flex justify-content-between  text-decoration-none">
	    			<span class="text-light mt-4 text-capitalize">
	    				<h6 class="font-weight-bold" style="letter-spacing: 2px">{{ $result->name }}</h6>
	    			</span>
	    			@if($result->photos->count() > 0)
                       <img src="/storage/{{ $result->photos->first()->images }}" style="width: 50px; height: 50px; border-radius: 100%;">
                    @else
                        <img src="{{ asset('frontend/img/no-image.png') }}" width="50">
                    @endif
	    		</a>
	    	</li>
	    	@endforeach
	    </ul>
	    @else
	    <div class="position-aboslute">
	    	<span><strong>No results for {{ $search }}</strong></span>
	    </div>
	    @endif
    @endif
</div>

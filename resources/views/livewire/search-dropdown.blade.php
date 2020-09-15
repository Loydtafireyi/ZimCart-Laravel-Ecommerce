<div class="col-xl-6 col-lg-5">
	<div class="header-search-form">
		<input wire:model.debounce.500ms="search" type="text" placeholder="Search on {{ $systemName->name }} ....">
		<span><i class="flaticon-search"></i></span>
	</div>

	@if(strlen($search) > 2)
		<div class="position-absolute bg-light header-search-result"  style="z-index: 1000;">
			@if(count($searchResults) > 0)
				<ul class="sub-menu" style="list-style: none;">
					@foreach($searchResults as $result)
						<li class="border-bottom mt-1 pb-1">
							<a href="{{ route('single-product', $result->slug) }}" class="d-flex align-items-center justify-content-between ml-3 mr-3">
							@if($result->photos->count() > 0)
                               <img src="/storage/{{ $result->photos->first()->images }}" width="50">
                            @else
                                <img src="{{ asset('frontend/img/no-image.png') }}" width="50">
                            @endif
								<span class="ml-4 text-dark">{{ $result->name }}</span>
							</a>
						</li>
					@endforeach
				</ul>
			@else
				<span>No results for "{{ $search }}"</span>
			@endif
		</div>
	@endif
</div>

<nav class="main-navbar">
	<div class="container">
		<!-- menu -->
		<ul class="main-menu">
			<li><a href="/">Home</a></li>
			<li><a href="{{ route('frontendCategories') }}">Our Shop</a>
				<ul class="sub-menu">
					@foreach($navCategories as $cat)
						<li><a href="{{ route('frontendCategory', $cat->slug) }}">{{ $cat->name }}</a></li>
					@endforeach	
				</ul>
			</li>
			<li><a href="#">On Sale
				<span class="new">New</span>
			</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="{{ route('contact-us') }}">Contact</a></li>
		</ul>
	</div>
</nav>

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
			<li><a href="{{ route('on-sale') }}">On Sale
				<span class="new">Sale</span>
			</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="{{ route('contact-us') }}">Contact</a></li>
			@auth
			<li><i class="flaticon-profile mr-2  text-light"></i><a href="#">{{ auth()->user()->name }}</a>
				<ul class="sub-menu">
					<li><a href="{{ route('my-profile.edit') }}">Settings</a></li>
					<li><a href="{{ route('my-orders.index') }}">My Orders</a></li>
					@if(auth()->user()->isAdmin())
					<li><a href="{{ route('home') }}" target="_blank">Admin Dashboard</a></li>
					@endif
					<li>
						<a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
					</li>
				</ul>
			</li>
			@else
			<li><a href="{{ route('login') }}">Signin</a></li>
			<li> <a href="{{ route('register') }}">Signup</a></li>
			@endauth
		</ul>
	</div>
</nav>

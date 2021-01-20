<!DOCTYPE html>
<html lang="zxx"> 
<head>
	@yield('seo')
	<!-- Favicon -->
	<link href="/storage/{{$shareSettings->favicon}}" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('frontend/css/all.css') }}"/>

	<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}"/>
	<!-- font-owesome icons link -->
    <link href="{{ asset('frontend/fontawesome/css/all.css') }}" rel="stylesheet">

	<livewire:styles />
	@yield('css')

	<!-- Global site tag (gtag.js) - Google Analytics -->
	@if($shareSettings->google_analytics != null)
	<script async src="https://www.googletagmanager.com/gtag/js?id={{ $shareSettings->google_analytics }}"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '{{ $shareSettings->google_analytics }}');
	</script>
	@endif

</head>
<body>
	
	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="/" class="site-logo">
							<img src="/storage/{{ $shareSettings->logo }}" alt="">
						</a>
					</div>
					<!-- search area -->
					<livewire:search-dropdown>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-heart"></i>
									@if(Cart::instance('wishlist')->count() != 0)
										<span>{{ Cart::instance('wishlist')->count() }}</span>
									@endif
								</div>
								<a href="{{ route('wishlist.index') }}">Wishlist</a>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>{{ Cart::instance('default')->count() }}</span>
								</div>
								<a href="{{ route('cart.index') }}">Shopping Cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<livewire:nav-bar>
	</header>
	<!-- Header section end -->

	@yield('content')


	<!-- Footer section -->
	<livewire:footer-detail>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<livewire:scripts />
	<script src="{{ asset('frontend/js/all.js') }}"></script>

	<script src="{{ asset('js/toastr.js') }}"></script>
	<script>
	    @if(Session::has('success'))
	    toastr.success("{{ Session::get('success')}}")
	    @endif
	</script>

	<script>
	    @if(Session::has('error'))
	    toastr.error("{{ Session::get('error')}}")
	    @endif
	</script>

	@yield('scripts')

	</body>
</html>

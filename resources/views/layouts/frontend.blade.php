<!DOCTYPE html>
<html lang="zxx"> 
<head>
	@yield('seo')
	<!-- Favicon -->
	<link href="/storage/{{$shareSettings->favicon}}" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"/>

	<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}"/>
	<!-- font-owesome icons link -->
    <link href="{{ asset('frontend/fontawesome/css/all.css') }}" rel="stylesheet">

	<livewire:styles />

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


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	{{-- <!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div> --}}

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
								<i class="flaticon-heart"></i>
								<a href="#">Wishlist</a>
								@auth
                                    
								@else
									
								@endauth
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
	<script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.slicknav.min.js') }}"></script>
	<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('frontend/js/main.js') }}"></script>

	<script src="{{ asset('js/toastr.js') }}"></script>
	<script>
	    @if(Session::has('success'))
	    toastr.success("{{ Session::get('success')}}")
	    @endif
	</script>

	<script>
	    @if(Session::has('errors'))
	    toastr.error("{{ Session::get('errors')}}")
	    @endif
	</script>

	@yield('scripts')

	</body>
</html>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Vanessa Cakes | The Cake Boss</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Vanessa Cakes | The Harare Cake Boss. Order online today!">
	<meta name="keywords" content="Vanessa Cakes, cakes, pastries, sweets, harare cakes, harare pastries, zimbabwe pastries, good cakes, wedding cakes, birthday cakes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="" rel="shortcut icon"/>

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


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="/" class="site-logo">
							<img src="" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Search on Vanessa Cakes ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								@auth
									<a href="{{ route('register') }}">My Orders</a>
									<a href="{{ route('register') }}">My Profile</a>
									<a href="{{ route('register') }}">Logout</a>
								@else
									<a href="{{ route('login') }}">Sign</a> In or <a href="{{ route('register') }}">Create Account</a>
								@endauth
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>0</span>
								</div>
								<a href="#">Shopping Cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="#">Cakes</a></li>
					<li><a href="#">Cakes</a></li>
					<li><a href="#">Cakes</a></li>
					<li><a href="#">Cakes
						<span class="new">New</span>
					</a></li>
					<li><a href="#">Cakes</a>
						<ul class="sub-menu">
							<li><a href="#">Cakes</a></li>
							<li><a href="#">Cakes</a></li>
							<li><a href="#">Cakes</a></li>
							<li><a href="#">Cakes</a></li>
							<li><a href="#">Cakes</a></li>
						</ul>
					</li>
					<li><a href="#">Pages</a>
						<ul class="sub-menu">
							<li><a href="./product.html">Cakes</a></li>
							<li><a href="./category.html">Cakes</a></li>
							<li><a href="./cart.html">Cakes</a></li>
							<li><a href="./checkout.html">Cakes</a></li>
							<li><a href="./contact.html">Cakes</a></li>
						</ul>
					</li>
					<li><a href="#">Blog</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->

	@yield('content')


	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="/"><img src="" alt=""></a>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<img src="{{ asset('frontend/img/cards.png') }}" alt="">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<ul>
							<li><a href="">About Us</a></li>
							<li><a href="">Track Orders</a></li>
							<li><a href="">Returns</a></li>
							<li><a href="">Jobs</a></li>
							<li><a href="">Shipping</a></li>
							<li><a href="">Blog</a></li>
						</ul>
						<ul>
							<li><a href="">Partners</a></li>
							<li><a href="">Bloggers</a></li>
							<li><a href="">Support</a></li>
							<li><a href="">Terms of Use</a></li>
							<li><a href="">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<div class="fw-latest-post-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="{{ asset('frontend/img/blog-thumbs/1.jpg') }}"></div>
								<div class="lp-content">
									<h6>Cakes Recipes</h6>
									<span>July 11, 2020</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="{{ asset('frontend/img/blog-thumbs/2.jpg') }}"></div>
								<div class="lp-content">
									<h6>Baking a Black Forest Cake with Vanessa</h6>
									<span>July 11, 2020</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Questions</h2>
						<div class="con-info">
							<span>C.</span>
							<p>Vanessa Cakes Ltd </p>
						</div>
						<div class="con-info">
							<span>B.</span>
							<p>50 Rossal Road Greendale, Harare, Zimbabwe </p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+263 777 464 712</p>
						</div>
						<div class="con-info">
							<span>E.</span>
							<p>order@vanessacakes.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
					<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
				</div>

				<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed By <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">Eloquent Geeks</a></p>

			</div>
		</div>
	</section>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.slicknav.min.js') }}"></script>
	<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('frontend/js/main.js') }}"></script>

	</body>
</html>

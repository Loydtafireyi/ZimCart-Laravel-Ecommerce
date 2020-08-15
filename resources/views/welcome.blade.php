@extends('layouts.frontend')

@section('content')

<!-- Hero section -->
    <section class="hero-section">
        <div class="hero-slider owl-carousel">
            @foreach($slides as $slide)
            <div class="hs-item set-bg" data-setbg="/storage/{{ $slide->image }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 text-white">
                            <span>{{ $slide->heading }}</span>
                            <p>{{ $slide->description }}</p>
                            <a href="/{{ $slide->link }}" class="site-btn sb-line">DISCOVER</a>
                            <a href="#" class="site-btn sb-white">ADD TO CART</a>
                        </div>
                    </div>
                    <div class="offer-card text-white">
                        <span>from</span>
                        <h2>$29</h2>
                        <p>SHOP NOW</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="container">
            <div class="slide-num-holder" id="snh-1"></div>
        </div>
    </section>
    <!-- Hero section end -->



    <!-- Features section -->
    <section class="features-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="{{ asset('frontend/img/icons/1.png') }}" alt="#">
                        </div>
                        <h2>Fast Secure Payments</h2>
                    </div>
                </div>
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="{{ asset('frontend/img/icons/2.png') }}" alt="#">
                        </div>
                        <h2>Premium Products</h2>
                    </div>
                </div>
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="{{ asset('frontend/img/icons/3.png') }}" alt="#">
                        </div>
                        <h2>Free & Affordable Delivery</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features section end -->


    <!-- letest product section -->
    <section class="top-letest-product-section">
        <div class="container">
            <div class="section-title">
                <h2>LATEST PRODUCTS</h2>
            </div>
            <div class="product-slider owl-carousel">
                @foreach($products as $p)
                <div class="product-item">
                    <div class="pi-pic">
                        <a href="{{ route('single-product', $p->slug) }}">
                            <img src="/storage/{{ $p->photos->first()->images }} " alt="">
                        </a>
                        <div class="pi-links">
                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>${{ $p->price }}</h6>
                        <a href="{{ route('single-product', $p->slug) }}"><p>{{ $p->name }}</p></a> 
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- letest product section end -->



    <!-- Product filter section -->
    <section class="product-filter-section">
        <div class="container">
            <div class="section-title">
                <h2>BROWSE TOP SELLING PRODUCTS</h2>
            </div>
            <ul class="product-filter-menu">
                @foreach($categories as $cat)
                    <li><a href="{{ route('frontendCategory', $cat->slug) }}">{{ $cat->name }}</a></li>
                @endforeach
            </ul>
            <div class="row">
                @foreach($products as $p)
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <a href="{{ route('single-product', $p->slug) }}">
                                <img src="/storage/{{ $p->photos->first()->images }}" alt="">
                            </a>
                            <div class="pi-links">
                                <a href="{{ route('single-product', $p->slug) }}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>{{ $p->price }}</h6>
                            <p> {{ $p->name }} </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center pt-5">
                <button class="site-btn sb-line sb-dark">LOAD MORE</button>
            </div>
        </div>
    </section>
    <!-- Product filter section end -->


    <!-- Banner section -->
    <section class="banner-section">
        <div class="container">
            <div class="banner set-bg" data-setbg="{{ asset('frontend/img/banner-bg.jpg') }}">
                <div class="tag-new">NEW</div>
                <span>New Recipes</span>
                <h2>SWEET PASTRIES</h2>
                <a href="#" class="site-btn">SHOP NOW</a>
            </div>
        </div>
    </section>
    <!-- Banner section end  -->

@endsection
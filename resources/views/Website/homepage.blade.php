@extends('layouts.site.site')
@section('title','HomePage')
@section('content')
    <!--================ Hero banner start =================-->
    @include('admin.success')
    @include('admin.error')
    <section class="hero-banner">
        <br>
        <div class="container">
            <div class="row no-gutters align-items-center pt-60px">
                <div class="col-5 d-none d-sm-block">
                    <div class="hero-banner__img">
                        <img class="img-fluid" src="{{ asset('site/img/home/hero-banner.png') }}" alt="">
                    </div>
                </div>
                <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                    <div class="hero-banner__content">
                        <h4>Shop is fun</h4>
                        <h1>Browse Our Premium Product</h1>
                        <p>Us which over of signs divide dominion deep fill bring theyre meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
                        <a class="button button-hero" href="#">Browse Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->
    <section class="section-margin mt-0">
        <div class="owl-carousel owl-theme hero-carousel">
            <div class="hero-carousel__slide">
                <img src="{{ asset('site/img/home/hero-slide1.png') }}" alt="" class="img-fluid">
                <a href="#" class="hero-carousel__slideOverlay">
                    <h3>Wireless Headphone</h3>
                    <p>Accessories Item</p>
                </a>
            </div>
            <div class="hero-carousel__slide">
                <img src="{{ asset('site/img/home/hero-slide2.png') }}" alt="" class="img-fluid">
                <a href="#" class="hero-carousel__slideOverlay">
                    <h3>Wireless Headphone</h3>
                    <p>Accessories Item</p>
                </a>
            </div>
            <div class="hero-carousel__slide">
                <img src="{{ asset('site/img/home/hero-slide3.png') }}" alt="" class="img-fluid">
                <a href="#" class="hero-carousel__slideOverlay">
                    <h3>Wireless Headphone</h3>
                    <p>Accessories Item</p>
                </a>
            </div>
        </div>
    </section>
    <!--================ Hero Carousel end =================-->



    <!-- ================ All product section start ================= -->
    <section class="section-margin phpcalc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>All <span class="section-intro__style">Products</span></h2>
            </div>
            <div class="row">
                @isset($products)
                    @foreach($products as $product)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card text-center card-product" >
                                <div class="card-product__img" >
                                    <img class="card-img" src="{{ $product->image }}" alt="">
                                    <ul class="card-product__imgOverlay">
                                        <form action="{{ route('cart.add.product') }}" method="POST">
                                            @csrf
                                            @if(auth('seller')->user())
                                                <input type="hidden" name="user_id" value="{{auth('seller')->user()->id}}">
                                            @endif
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <li><button type="submit"><i class="ti-shopping-cart"></i></button></li>
                                        </form>
                                        <form action="{{ route('user.add.fav') }}" method="POST">
                                            @csrf
                                            @if(auth('seller')->user())
                                                <input type="hidden" name="user_id" value="{{auth('seller')->user()->id}}">
                                            @endif
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <li><button type="submit"><i class="ti-heart"></i></button></li>
                                        </form>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <p>{{$product->category->name}}</p>
                                    <h4 class="card-product__title"><a href="{{ route('product.details', $product->name) }}">{{$product->name}}</a></h4>
                                    <p class="card-product__price">${{$product->price}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset

            </div>
        </div>
    </section>
    <!-- ================ All product section end ================= -->


    <!-- ================ offer section start ================= -->
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="offer__content text-center">
                        <h3>Up To 50% Off</h3>
                        <h4>Winter Sale</h4>
                        <p>Him shed let them sixth saw light</p>
                        <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ offer section end ================= -->

    <!-- ================ Best Selling item  carousel ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Best <span class="section-intro__style">Sellers</span></h2>
            </div>
            <div class="owl-carousel owl-theme" id="bestSellerCarousel">
                @isset($products)
                    @foreach($products as $product)
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{$product->image}}" alt="">
                        <ul class="card-product__imgOverlay">
                            <form action="{{ route('cart.add.product') }}" method="POST">
                                @csrf
                                @if(auth('seller')->user())
                                    <input type="hidden" name="user_id" value="{{auth('seller')->user()->id}}">
                                @endif
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <li><button type="submit"><i class="ti-shopping-cart"></i></button></li>
                            </form>
                            <form action="{{ route('user.add.fav') }}" method="POST">
                                @csrf
                                @if(auth('seller')->user())
                                    <input type="hidden" name="user_id" value="{{auth('seller')->user()->id}}">
                                @endif
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <li><button type="submit"><i class="ti-heart"></i></button></li>
                            </form>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>{{$product->category->name}}</p>
                        <h4 class="card-product__title"><a href="{{ route('product.details', $product->name) }}">{{$product->name}}</a></h4>
                        <p class="card-product__price">${{$product->price}}</p>
                    </div>
                </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!-- ================ Best Selling item  carousel end ================= -->


@stop

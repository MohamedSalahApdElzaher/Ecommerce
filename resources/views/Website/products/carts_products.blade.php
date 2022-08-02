@extends('layouts.site.site')
@section('title','Carts Products')
@section('content')
    <!-- ================ favorites products section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Carts <span class="section-intro__style">Products</span></h2>
            </div>
            <div class="row">
                @if($carts->count() > 0)
                    @foreach($carts as $fav)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <img class="card-img" src="{{ asset($fav->product->image) }}" alt="">
                                    <ul class="card-product__imgOverlay">
                                        {{--   <li><button><i class="ti-search"></i></button></li>--}}
                                        <li><button><i class="ti-shopping-cart"></i></button></li>
                                        <form action="" method="POST">
                                            @csrf
                                            @if(auth('seller')->user())
                                                <input type="hidden" name="user_id" value="{{auth('seller')->user()->id}}">
                                            @endif
                                            <input type="hidden" name="product_id" value="{{$fav->product->id}}">
                                            <li><button type="submit"><i class="ti-heart"></i></button></li>
                                        </form>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <p>{{$fav->product->category->name}}</p>
                                    <h4 class="card-product__title"><a href="{{route('product.details', $fav->product->name)}}">{{$fav->product->name}}</a></h4>
                                    <p class="card-product__price">${{$fav->product->price}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="alert-danger">Carts is empty</p>
                @endif

            </div>
        </div>
    </section>
    <!-- ================ All product section end ================= -->



@stop

<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="{{ route('home_page') }}">Home</a></li>
                        @if (!auth('seller')->user())
                            <li class="nav-item"><a class="nav-link" href="{{ route('seller.register') }}">Register</a></li>
                        @endif
                        @if (!auth('seller')->user())
                            <li class="nav-item"><a class="nav-link" href="{{ route('seller_login_from') }}">Login</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
                    </ul>

                    <ul class="nav-shop">
                        <a href="{{ route('user.get.fav') }}">
                            <li class="nav-item">
                                <button>
                                    <i class="ti-heart"></i>
                                    @if (auth('seller')->user())
                                        <span
                                            class="nav-shop__circle">{{ \App\Models\Favorit::where('user_id', auth('seller')->user()->id)->count() }}</span>
                                    @else
                                        <span class="nav-shop__circle">0</span>
                                    @endif
                                </button>
                            </li>
                        </a>
                        <a href="{{ route('user.get.cart') }}">
                        <li class="nav-item">
                            <button>
                                <i class="ti-shopping-cart">
                                </i>
                                @if (auth('seller')->user())
                                <span class="nav-shop__circle">
                                        {{
                                        \App\Models\CartDetails::where('cart_id',
                                        \App\Models\Cart::where('user_id',
                                          auth('seller')->user()->id)->first()->id)->count()
                                          }}
                                </span>
                                @else
                                    <span class="nav-shop__circle">0</span>
                                @endif
                            </button> </li>
                        </a>
                    </ul>

                    @if (auth('seller')->user())
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth('seller')->user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                    href="{{ route('edit.profile', auth('seller')->user()->id) }}">Edit Profile</a>
                                <a class="dropdown-item" href="{{ route('seller.logout') }}">Logout</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->

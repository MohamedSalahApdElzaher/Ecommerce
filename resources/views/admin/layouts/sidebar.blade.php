<!-- sidebar area -->
<aside class="sidebar-wrapper ">
    <nav class="sidebar-nav">
        <ul class="metismenu" id="menu1">
            <li class="single-nav-wrapper">
                <a href="{{route('Admin.dashboard')}}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-home"></i></span>
                    <span class="menu-text">home</span>
                </a>
            </li>

            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-table"></i></span>
                    <span class="menu-text">category</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('admin.category')}}">all categories</a></li>
                </ul>
            </li>

            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Products</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('products.index')}}">All products</a></li>
                </ul>
            </li>

            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-sort-alpha-down-alt"></i></span>
                    <span class="menu-text">Users</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{ route('users.index') }}">All users</a></li>               
                </ul>
            </li>
            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="menu-text">Maps</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="#">Amcharts Maps</a></li>
                    <li><a href="#">Data Maps</a></li>
                    <li><a href="#">Jvector Maps</a></li>
                    <li><a href="#">Google map</a></li>
                    <li><a href="#">Snazzy Map</a></li>
                </ul>
            </li>
            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="far fa-envelope"></i></span>
                    <span class="menu-text">Mailbox</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="#">Mailbox</a></li>
                    <li><a href="#">Mailbox Details</a></li>
                    <li><a href="#">Compose</a></li>
                </ul>
            </li>
            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-mobile-alt"></i></span>
                    <span class="menu-text">App View</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="invoice.html">Invoice</a></li>
                    <li><a href="#">Vertical timeline</a></li>
                    <li><a href="#">Horizontal timeline</a></li>
                    <li><a href="#">Pricing Table</a></li>
                </ul>
            </li>
            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="far fa-copy"></i></span>
                    <span class="menu-text">Other pages</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="login.html">Login</a></li>
                    <li><a href="registration.html">Register</a></li>
                    <li><a href="screen_lock.html">screen lock</a></li>
                    <li><a href="forget.html">forget Password</a></li>
                </ul>
            </li>
            <li class="single-nav-wrapper">
                <a href="#" class="menu-item">
                    <span class="left-icon"><i class="fas fa-home"></i></span>
                    <span class="menu-text">Calender</span>
                </a>
            </li>
            <li class="single-nav-wrapper">
                <a href="blank_page.html" class="menu-item">
                    <span class="left-icon"><i class="fas fa-file"></i></span>
                    <span class="menu-text">Blank Page</span>
                </a>
            </li>
        </ul>
    </nav>
</aside><!-- /sidebar Area-->

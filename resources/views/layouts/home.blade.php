<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/vendor/css/style.css">
        <title>@yield('title')</title>
    </head>
    <body>
        <!-- Header -->
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo" style="color: indigo;">
                        <h2>Demo</h2>
                    </div>

                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('all.products') }}">Products</a></li>
                            <li><a href="#">Category</a></li>
                            <li><a href="#">Contact</a></li>

                            @if (Route::has('login'))
                                @auth
                                    @if(Auth::user()->role === 'customer')
                                        <li><a href="{{ route('user.dashboard') }}">My Account</a></li>
                                    @endif

                                    @if(Auth::user()->role === 'admin')
                                        <li><a href="{{ route('admin.dashboard') }}">My Account</a></li>
                                    @endif
                                @else
                                    <li><a href="{{ route('login') }}">Log in</a></li>

                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                    </nav>
                </div>
                @yield('heros')
            </div>
        </div>

        <div class="container">
            @yield('content')
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>Get App</h3>
                        <p>Download Our App</p>
                    </div>
                    <div class="footer-col-2">
                        <h3>Get In Touch</h3>
                        <p>Susbscribe to our page.</p>
                    </div>
                    <div class="footer-col-3">
                        <h3>Useful Links</h3>
                        <ul>
                            <li><a href="#">Coupons</a></li>
                            <li><a href="#">Blog Post</a></li>
                            <li><a href="#">Return Policy</a></li>
                            <li><a href="#">Join Affiliate</a></li>
                        </ul>
                    </div>
                    <div class="footer-col-4">
                        <h3>Follow Us</h3>
                        <ul>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">LinkedIn</a></li>
                            <li><a href="#">Twitter</a></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <p class="copyright">Copyright 2021 - Demo</p>
            </div>
        </div>
    </body>
</html>

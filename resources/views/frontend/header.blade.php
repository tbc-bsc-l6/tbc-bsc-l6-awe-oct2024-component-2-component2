<div class="nav-section main-menu navbar-light bg-warning header  ">
    <div class="d-flex ">

        <nav class="navbar navbar-expand-lg container ">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('/images/logo.svg') }}" alt="Image" width="80" height="80" alt=""
                    class="mr-5">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <div class="ml-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="/" style="color: black;">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ Request::is('menu') ? 'active' : '' }}">
                            <a class="nav-link" href="/menu" style="color: black;">Menu</a>
                        </li>
                        <li class="nav-item {{ Request::is('about-us') ? 'active' : '' }}">
                            <a class="nav-link" href="/about-us" style="color: black;">About Us</a>
                        </li>
                        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                            <a class="nav-link" href="/contact" style="color: black;">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            @auth
                            @if (Auth::user()->role == 'admin')
                            <a class="nav-link dropdown-toggle" style="color: black;" href=""
                                id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                                    href="{{ route('admin.dashboard') }}" style="color: black;">Dashboard</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}" style="color: black;">Logout</a>
                            </div>
                            @else
                            @if (Auth::user()->email_verified_at)
                            <a class="nav-link dropdown-toggle" style="color: orangered;" href=""
                                id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{ Request::is('my-profile') ? 'active' : '' }}"
                                    href="{{ url('my-profile') }}" style="color: black;">My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item {{ Request::is('my-orders') ? 'active' : '' }}"
                                    href="{{ url('my-orders') }}" style="color: black;">My Orders</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="color: black;">Logout</button>
                                </form>
                            </div>
                            @else
                            <a class="nav-link dropdown-toggle" style="color: orangered;" href=""
                                id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{ Request::is('verify-email') ? 'active' : '' }}"
                                    href="{{ url('verify-email') }}" style="color: black;">Verify Email</a>
                            </div>
                            @endif
                            @endif
                            @else
                            <a class="nav-link dropdown-toggle" style="color: black;" href="" id="navbarDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Register
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{ Request::is('login') ? 'active' : '' }}"
                                    href="{{ route('login') }}" style="color: black;">Login</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item {{ Request::is('register') ? 'active' : '' }}"
                                    href="{{ route('register') }}" style="color: black;">SignUp</a>
                            </div>
                            @endauth
                        </li>
                        @auth
                        <li class="nav-item">
                            @php
                            $cartCount = App\Helpers\CartHelper::CartCount();
                            @endphp
                            @if (Auth::user()->email_verified_at)
                            <div class="cart-container">
                                <a class="cart {{ Request::is('cart') ? 'active' : '' }}"
                                    href="{{ url('/cart', Auth::user()->id) }}" style="text-decoration: none">
                                    <img src="{{ asset('/images/cart.png') }}" alt="Cart Icon" width="20" height="20">
                                </a>
                                ({{ $cartCount }})
                            </div>
                            @else
                            <div class="cart-container">
                                <a class="cart disabled" href="{{ url('/cart', Auth::user()->id) }}"
                                    style="text-decoration: none; pointer-events: none;">
                                    <img src="{{ asset('/images/cart.png') }}" alt="Cart Icon" width="20" height="20">
                                </a>
                                ({{ $cartCount }})
                            </div>
                            @endif
                        </li>
                        @endauth
                    </ul>
                </div>

            </div>
        </nav>

    </div>
</div>
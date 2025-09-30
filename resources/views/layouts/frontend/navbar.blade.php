<header class="bg-white shadow py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo or Brand Name -->
        <div class="d-flex align-items-center">
            <img src="{{ asset('assets/img/logoo-remove.png') }}" alt="Logo" width="30" height="30"
                class="me-2">
            <a href="{{ route('home.main') }}" class="fs-4 fw-bold text-primary text-decoration-none mb-0">
                FlyDesign
            </a>
        </div>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item me-2">
                            <a class="nav-link text-dark @yield('homeActive')" href="{{ route('home.main') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item me-3"> <a class="nav-link text-dark"
                                href="http://localhost:8000/articles/about">About</a> </li>
                        <li class="nav-item me-2">
                            <a class="nav-link @yield('articlesActive')" href="{{ route('home.articles.index') }}">
                                {{ __('Blog') }}
                            </a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link @yield('informationActive')" href="{{ route('home.information.index') }}">
                                {{ __('Informasi') }}
                            </a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link @yield('teamActive')" href="{{ route('home.team.index') }}">
                                {{ __('Pengajar') }}
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link @yield('contactActive')" href="{{ route('home.contact.index') }}">
                                {{ __('Kontak') }}
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link @yield('productsActive')" href="{{ route('home.products.index') }}">
                                {{ __('Produk') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.show') }}">
                                <i class="bi bi-cart4"></i>
                                @if (isset($cartItemCount) && $cartItemCount > 0)
                                    <span class="badge bg-danger rounded-pill">{{ $cartItemCount }}</span>
                                @endif
                            </a>
                        </li>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link fw-bold text-primary" href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <!-- Dropdown User -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold text-primary" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->role === 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                            {{ __('Dashboard ') }}
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('home.users.dashboard') }}">
                                            {{ __('Dashboard ') }}
                                        </a>
                                    @endif

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- End Navbar -->

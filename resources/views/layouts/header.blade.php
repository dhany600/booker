<header>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo-container">
                        <img class="logo-image" src="{{ asset('src/img/image 2.png') }}" alt="">
                        <h3 class="logo-title">
                            BOOKERS
                        </h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="button-container">
                        <div class="item-container">
                            <a href="{{ route('profile.index') }}" class="student-name-text">
                                {{ auth()->user()->nama_lengkap }}
                            </a>
                            <p class="student-id-number">
                                {{ auth()->user()->nomor_induk }}
                            </p>
                        </div>
                        <div class="item-container">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                <!-- Add CSRF token for security -->
                            </form>

                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <a href="/admin-dashboard/book" class="admin-dashboard-button">
                                Dashboard
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                                    <a class="nav-link" href="/home">
                                        Beranda
                                </a>
                                </li>
                                <li class="nav-item {{ Request::is('tentang-kami') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('home.about') }}">
                                        Tentang Kami
                                    </a>
                                </li>
                                <li class="nav-item {{ Request::is('katalog') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('catalog.index') }}">
                                        Katalog
                                    </a>
                                </li>
                                <li class="nav-item {{ Request::is('buku-saya', 'buku-favorit', 'riwayat-pinjam') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('bukuSaya.index') }}">
                                        Buku Saya
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
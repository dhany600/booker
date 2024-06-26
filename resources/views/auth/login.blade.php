<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AdminLTE</title>

    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('src/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('src/css/styles.css') }}">
</head>

<body>
    <div class="login-page">
        <div class="background-area">
            <div class="left-area">
                <img class="background-image" src="{{ asset('src/img/image 1.png') }}" alt="">
                <img class="logo-image" src="{{ asset('src/img/images-removebg-preview (2) 1.png') }}" alt="">
            </div>
            <div class="right-area">
                <div class="flex-item-container">
                    <img class="logo-image" src="{{ asset('src/img/image 2.png') }}" alt="">
                    <h3 class="login-title">
                        WELCOME BOOKERS!
                    </h3>
                    <div class="card">
                        @if ($msg = session('error'))
                            <div style="background: rgba(255, 0, 0, 1); border-radius: 10px; padding: 10px; margin-bottom: 5px; color: white">
                                <strong>Warning!</strong> {{ $msg }}
                            </div>
                        @endif
                        @if ($msg2 = session('success'))
                            <div style="background: rgba(0, 255, 0, 1); border-radius: 10px; padding: 10px; margin-bottom: 5px; color: white">
                                <strong>Berhasil!</strong> {{ $msg2 }}
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $item)
                            <div style="background: rgba(255, 0, 0, 1); border-radius: 10px; padding: 10px; margin-bottom: 5px; color: white">
                                <strong>Warning!</strong> {{ $item }}
                            </div>
                            @endforeach
                        @endif
                        <form action="/login" method="POST">
                            @csrf
                            <p class="input-label">
                                Email
                            </p>
                            <input class="input-form" type="email" placeholder="Email" name="email">
                            @error('email')
                                <small>{{ $message }}</small>
                            @enderror
                            <p class="input-label">
                                Password
                            </p>
                            <input class="input-form" type="password" placeholder="Password" name="password">
                                                        @error('password')
                                <small>{{ $message }}</small>
                            @enderror
                            <div class="flex-button-area login-area">
                                <a class="forgot-password-button" href="#">
                                    Lupa Password?
                                </a>
                                <a class="forgot-password-button" href="{{ route('register') }}">
                                    Belum Punya Akun?
                                </a>
                                <button class="login-button" type="submit">
                                    Login
                                </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('src/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('src/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('src/js/adminlte.min.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('src/js/demo.js') }}"></script> --}}
    @yield('js')
    @stack('scripts')
</body>

</html>
    @yield('js')
    @stack('scripts')
</body>

</html>
    @yield('js')
    @stack('scripts')
</body>

</html>
    @yield('js')
    @stack('scripts')
</body>

</html>
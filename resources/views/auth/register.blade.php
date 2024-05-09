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
                        @if ($errors->any())
                            @foreach ($errors->all() as $item)
                            <div style="background: rgba(255, 0, 0, 1); border-radius: 10px; padding: 10px; margin-bottom: 5px; color: white">
                                <strong>Warning!</strong> {{ $item }}
                            </div>
                            @endforeach
                        @endif
                        <form action="/register" style="margin-bottom: 0;" method="post">
                            @method('POST')
                            @csrf
                            <p class="input-label">
                                Nama Lengkap
                            </p>
                            <input name="nama_lengkap" id="nama_lengkap" class="input-form" type="text" placeholder="Nama Lengkap" value="Dhany Martin">
                            <p class="input-label">
                                Nomor Induk
                            </p>
                            <input name="nomor_induk" id="nomor_induk" class="input-form" type="text" placeholder="Nomor Induk" value="12180215">
                            <p class="input-label">
                                Kelas
                            </p>
                            <input name="kelas" id="kelas" class="input-form" type="text" placeholder="Kelas" value="XI B">
                            <p class="input-label">
                                Email
                            </p>
                            <input name="email" id="email" class="input-form" type="email" placeholder="Email" value="dhanymartin@gmail.com">
                            <p class="input-label">
                                Password
                            </p>
                            <input name="password" id="password" class="input-form" type="password" placeholder="Password" value="password">
                            <div class="flex-button-area">
                                <p class="login-reminder">
                                    Sudah punya akun? , <a href="{{ route('login') }}">Masuk</a> disini
                                </p>
                                <button class="login-button" type="submit" style="border: none">
                                    Daftar
                                </button>
                            </div>
                        </form>
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
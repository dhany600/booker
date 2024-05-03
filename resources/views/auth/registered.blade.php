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
    <div class="login-page registered-page">
        <div class="background-area">
            <div class="left-area">
                <img class="background-image" src="{{ asset('src/img/image 1.png') }}" alt="">
                <img class="logo-image" src="{{ asset('src/img/images-removebg-preview (2) 1.png') }}" alt="">
            </div>
            <div class="right-area">
                <div class="flex-item-container">
                    <div class="card">
                        <img class="checklist-image" src="{{ asset('src/img/CheckCircle.png') }}" alt="">
                        <h3 class="login-title">
                            BERHASIL
                        </h3>
                        <p class="input-label">
                            Silahkan cek email untuk verifikasi
                        </p>
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
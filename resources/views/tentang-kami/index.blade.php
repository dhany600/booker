@extends('layouts.main')

@section('container')
    <div class="page-about-us">
        <div class="background-color">
            <div class="container">
                <div class="flex-container">
                    <div class="left-item">
                        <img src="{{ asset('src/img/about-image.png') }}" alt="">
                    </div>
                    <div class="right-item">
                        <h3 class="title-text">
                            Hi, we’re BOOKERS!
                        </h3>
                        <p class="about-text">
                            Terletak di SMA Al Hikmah Surabaya, Bookers adalah perpustakaan digital untuk siswa-siswi Al-Hikmah Surabaya membaca dimanapun dan kapanpun. Dengan jadwal yang padat, siswa-siswi dapat meminjam dan menikmati buku tanpa pergi menuju perpustakaan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('container')
    <div class="page-home">
        <div class="background-color">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-10">
                                <form class="form-inline my-2 my-lg-0">
                                    <input class="search-input form-control w-100" type="search" placeholder="Search" aria-label="Search">
                                </form>
                            </div>
                            <div class="col-md-2">
                                <div class="">
                                    <select class="" id="exampleFormControlSelect1">
                                        <option>Filter</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <h3 class="text-title">
                            Kategori
                        </h3>
                        <div class="category-area">
                            <div class="card active-card">
                                <a href="#">
                                    <img class="category-image" src="{{ asset('src/img/Screen_Shot_2024-04-30_at_00.39 1.png') }}" alt="">
                                    <p class="category-text">
                                        Rekomendasi
                                    </p>
                                </a>
                            </div>
                            <div class="card">
                                <a href="#">
                                    <img class="category-image" src="{{ asset('src/img/Screen_Shot_2024-04-30_at_00.39 1.png') }}" alt="">
                                    <p class="category-text">
                                        Rekomendasi
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <h3 class="text-title">
                            Rekomendasi
                        </h3>
                        <div class="book-area">
                            @foreach ($books as $book)
                            <div class="card">
                                <div class="flex-container">
                                    <div class="left-item">
                                        <img src="{{ asset('storage/' . $book->gambar_buku) }}" alt="" class="book-image">
                                    </div>
                                    <div class="right-item">
                                        <h3 class="book-title">
                                            {{ $book->nama_buku }}
                                        </h3>
                                        <p class="book-synopsis-text">
                                            {{ $book->synopsis }}
                                        </p>
                                        <div class="flex-area">
                                            <div class="left-area">
                                                <p class="writter-name-text">
                                                    Pengarang : 
                                                </p>
                                                <p class="writer-name-badge">
                                                    {{ $book->pengarang }}
                                                </p>
                                            </div>
                                            <div class="right-area">
                                                <svg id="fav1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="#EE0000" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart">
                                                    <path
                                                        d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                                    </svg>
                                                <label for="fav1">
                                                    Favorit
                                                </label>
                                                <a href="#" class="borrow-button">
                                                    Pinjam
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

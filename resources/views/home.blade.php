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
                            <div class="card {{ request()->has('category') ? '' : 'active-card' }}">
                                <a href="{{ route('catalog.index')}}">
                                    <img class="category-image" src="{{ asset('storage/gambar_buku/rekomendasi.png') }}" alt="">
                                    <p class="category-text">Rekomendasi</p>
                                </a>
                            </div>
                            @foreach ($categories as $index => $category)
                            <div class="card {{ request()->input('category') == $category->id ? 'active-card' : '' }}">
                                <a href="{{ route('catalog.index', ['category' => $category->id]) }}">
                                    <img class="category-image"
                                        src="{{ asset('storage/' . $category->gambar_kategori) }}" alt="">
                                    <p class="category-text">{{ $category->nama_kategori }}</p>
                                </a>
                            </div>
                            @if ($index == 1)
                            @break
                            @endif
                            @endforeach


                            <div class="card">
                                <button type="button" class="borrow-button" data-toggle="modal"
                                data-target="#categoryModal" style="background-color: unset; border: none; min-width: unset; padding: 0">
                                    <p class="category-text">
                                        Tampilkan Semua Kategori
                                    </p>
                                </button>
                            </div>
                            
                            <div class="modal modal-category-area fade" id="categoryModal" tabindex="-3" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="flex-area">
                                                <div class="card">
                                                    <a href="{{ route('catalog.index')}}">
                                                        <img class="category-image"
                                                            src="{{ asset('storage/gambar_buku/rekomendasi.png') }}" alt="">
                                                        <p class="category-text">
                                                            Rekomendasi
                                                        </p>
                                                    </a>
                                                </div>
                                                @foreach ($categories as $category)
                                                <div class="card">
                                                    <a href="{{ route('catalog.index', ['category' => $category->id]) }}">
                                                        <img class="category-image"
                                                            src="{{ asset('storage/' . $category->gambar_kategori) }}"
                                                            alt="">
                                                        <p class="category-text">
                                                            {{ $category->nama_kategori }}
                                                        </p>
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                <button class="favorite-button @if(in_array($book->id, $userFavorites)) active-favorite-heart @endif" value="{{ $book->id }}">
                                                    <svg id="fav1" xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="#EE0000" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="lucide lucide-heart">
                                                        <path
                                                            d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                                    </svg>
                                                </button>
                                                <a href="#" class="borrow-button" data-toggle="modal" data-target="#exampleModal{{ $book->id }}">
                                                    Pinjam
                                                </a>
                                                <div class="modal modal-borrow-book fade" id="exampleModal{{ $book->id }}" tabindex="-2"
                                                    aria-labelledby="exampleModalLabel{{ $book->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Modal body content goes here -->
                                                                <div class="modal-flex">
                                                                    <div class="left-area">
                                                                        <img src="{{ asset('storage/' . $book->gambar_buku) }}"
                                                                            alt="" class="book-image">
                                                                    </div>
                                                                    <div class="right-area">
                                                                        <h3 class="book-title">
                                                                            {{ $book->nama_buku }}
                                                                        </h3>
                                                                        <p class="book-synopsis w-100">
                                                                            {{ $book->synopsis }}
                                                                        </p>
                                                                        <div class="inner-flex-area w-100">
                                                                            <div class="left-area">
                                                                                <p class="writer-text-title">
                                                                                    Penulis : 
                                                                                    <p class="writer-name">
                                                                                        {{ $book->pengarang }}
                                                                                    </p>
                                                                                </p>
                                                                            </div>
                                                                            <div class="right-area">
                                                                                <p class="limit-text-title">
                                                                                    Limit : 
                                                                                    <p class="limit-name">
                                                                                        {{ $book->book_quantity - $book->book_left }} / {{ $book->book_quantity }}
                                                                                    </p>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="borrow-button btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#borrowModal" onclick="showModalBorrow({{ $book->id }})">
                                                                    Pinjam
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal modal-borrow-book confirmation-modal fade" id="borrowModal" tabindex="-1"
                                aria-labelledby="borrowModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Modal body content goes here -->
                                            <div class="modal-flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="82" height="82"
                                                    viewBox="0 0 82 82" fill="none">
                                                    <path
                                                        d="M40.625 0C32.5901 0 24.7357 2.38261 18.055 6.84655C11.3742 11.3105 6.16722 17.6552 3.09241 25.0785C0.017602 32.5017 -0.786908 40.6701 0.780616 48.5505C2.34814 56.431 6.2173 63.6697 11.8988 69.3512C17.5803 75.0327 24.819 78.9019 32.6995 80.4694C40.5799 82.0369 48.7483 81.2324 56.1715 78.1576C63.5948 75.0828 69.9395 69.8758 74.4035 63.195C78.8674 56.5143 81.25 48.6599 81.25 40.625C81.2386 29.8541 76.9549 19.5275 69.3387 11.9113C61.7225 4.29515 51.3959 0.0113743 40.625 0ZM37.5 21.875C37.5 21.0462 37.8293 20.2513 38.4153 19.6653C39.0014 19.0792 39.7962 18.75 40.625 18.75C41.4538 18.75 42.2487 19.0792 42.8347 19.6653C43.4208 20.2513 43.75 21.0462 43.75 21.875V43.75C43.75 44.5788 43.4208 45.3737 42.8347 45.9597C42.2487 46.5458 41.4538 46.875 40.625 46.875C39.7962 46.875 39.0014 46.5458 38.4153 45.9597C37.8293 45.3737 37.5 44.5788 37.5 43.75V21.875ZM40.625 62.5C39.6979 62.5 38.7916 62.2251 38.0208 61.71C37.2499 61.1949 36.6491 60.4628 36.2943 59.6063C35.9395 58.7498 35.8467 57.8073 36.0276 56.898C36.2084 55.9887 36.6549 55.1535 37.3104 54.4979C37.966 53.8424 38.8012 53.3959 39.7105 53.2151C40.6198 53.0342 41.5623 53.127 42.4188 53.4818C43.2754 53.8366 44.0075 54.4374 44.5225 55.2083C45.0376 55.9791 45.3125 56.8854 45.3125 57.8125C45.3125 59.0557 44.8186 60.248 43.9396 61.1271C43.0605 62.0061 41.8682 62.5 40.625 62.5Z"
                                                        fill="#E6CA32" />
                                                    <path
                                                        d="M37.5 21.875C37.5 21.0462 37.8293 20.2513 38.4153 19.6653C39.0014 19.0792 39.7962 18.75 40.625 18.75C41.4538 18.75 42.2487 19.0792 42.8347 19.6653C43.4208 20.2513 43.75 21.0462 43.75 21.875V43.75C43.75 44.5788 43.4208 45.3737 42.8347 45.9597C42.2487 46.5458 41.4538 46.875 40.625 46.875C39.7962 46.875 39.0014 46.5458 38.4153 45.9597C37.8293 45.3737 37.5 44.5788 37.5 43.75V21.875Z"
                                                        fill="#F6FFF7" />
                                                    <path
                                                        d="M40.625 62.5C39.6979 62.5 38.7916 62.2251 38.0208 61.71C37.2499 61.1949 36.6491 60.4628 36.2943 59.6063C35.9395 58.7498 35.8467 57.8073 36.0276 56.898C36.2084 55.9887 36.6549 55.1535 37.3104 54.4979C37.966 53.8424 38.8012 53.3959 39.7105 53.2151C40.6198 53.0342 41.5623 53.127 42.4188 53.4818C43.2754 53.8366 44.0075 54.4374 44.5225 55.2083C45.0376 55.9791 45.3125 56.8854 45.3125 57.8125C45.3125 59.0557 44.8186 60.248 43.9396 61.1271C43.0605 62.0061 41.8682 62.5 40.625 62.5Z"
                                                        fill="#F6FFF7" />
                                                </svg>
                                                <h3 class="reminder-title">
                                                    Apa Kamu Yakin Ingin Meminjam Buku Ini ?
                                                </h3>
                                                <p class="reminder-text">
                                                    Durasi waktu peminjaman maksimal 14 hari, jika lebih secara otomatis
                                                    buku pinjaman akan kembali ke katalog.
                                                </p>
                                                <button class="cancel-button" data-dismiss="modal">
                                                    Tidak
                                                </button>
                                                <button class="confirm-button" id="borrowBookButton{{ $book->id }}"
                                                    value="{{ $book->id }}">
                                                    Ya
                                                </button>
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

    
    <div id="auth-status" data-auth="{{ auth()->check() ? 'true' : 'false' }}"></div>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            var isAuthenticated = $('#auth-status').data('auth') === 'true';
            $('.confirm-button').click(function() {
                const bookId = window.bookId ?? false;

                if (!isAuthenticated) {
                    // If not authenticated, redirect to the login page
                    window.location.href = "{{ route('login') }}";
                    return;
                }
                
                if (!bookId) {
                    return;
                }

            });

            $('.confirm-button').click(function () {
                var bookId = $(this).val();
                $.ajax({
                    url: '{{ route("borrow.book") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        book_id: bookId
                    },
                    success: function (response) {
                        console.log(response);
                        // Handle success, e.g., show a success message
                        // window.location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle errors, e.g., show an error message
                    }
                });
            });

            $('.favorite-button').click(function () {
                var bookId = $(this).val();
                var url = "{{ route('favorite.toggle', ':bookId') }}".replace(':bookId', bookId);

                if (!isAuthenticated) {
                    // If not authenticated, redirect to the login page
                    window.location.href = "{{ route('login') }}";
                    return;
                }

                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.status === 'favorited') {
                            // Update UI to show the book is favorited
                            $('.favorite-button[value="' + bookId + '"]').addClass('active-favorite-heart');
                        } else if (response.status === 'unfavorited') {
                            // Update UI to show the book is unfavorited
                            $('.favorite-button[value="' + bookId + '"]').removeClass('active-favorite-heart');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        function showModalBorrow(id) {
            window.bookId = id;
        }
    </script>
@endsection

@extends('layouts.main')

@section('container')
    <div class="page-buku-saya">
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
                        <div class="buku-saya-area">
                            <a href="#" class="menu-link active-link">
                                <p class="category-text">
                                    Buku Saya
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <h3 class="text-title">
                            Buku Saya
                        </h3>
                        <div class="book-area">
                            @foreach ($books as $book)
                            <div class="card">
                                <div class="flex-container">
                                    <div class="left-item">
                                        <img src="{{ asset('storage/' . $book->gambar_buku) }}" alt=""
                                            class="book-image">
                                    </div>
                                    <div class="right-item">
                                        <h3 class="book-title">
                                            {{ \Illuminate\Support\Str::limit($book->nama_buku, 57, '...') }}
                                        </h3>
                                        <p class="writer-name-badge">
                                            {{ $book->pengarang }}
                                        </p>
                                        <div class="flex-area">
                                            <div class="left-area">
                                                <div class="book-stock">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                                        viewBox="0 0 13 13" fill="none">
                                                        <path
                                                            d="M12.0732 10.8994L10.1285 1.65331C10.1034 1.5324 10.0546 1.41765 9.98494 1.31565C9.9153 1.21365 9.8262 1.12641 9.72275 1.05895C9.6193 0.991494 9.50354 0.945139 9.38212 0.922551C9.26071 0.899964 9.13602 0.901589 9.01523 0.927334L6.27246 1.51679C6.02985 1.56991 5.81803 1.71667 5.68307 1.92515C5.5481 2.13363 5.50091 2.38697 5.55176 2.63007L7.49648 11.8762C7.53982 12.0871 7.65447 12.2767 7.82114 12.4131C7.98782 12.5495 8.19636 12.6243 8.41172 12.625C8.47829 12.6249 8.54467 12.6178 8.60977 12.6039L11.3525 12.0144C11.5954 11.9612 11.8075 11.8141 11.9425 11.6053C12.0774 11.3965 12.1244 11.1427 12.0732 10.8994ZM6.46875 2.43847C6.46875 2.43495 6.46875 2.43319 6.46875 2.43319L9.21094 1.84726L9.40606 2.77714L6.66387 3.36718L6.46875 2.43847ZM7.05469 5.21464L6.8584 4.283L9.60176 3.69354L9.79746 4.62519L7.05469 5.21464ZM11.1562 11.098L8.41406 11.684L8.21895 10.7541L10.9611 10.1641L11.1562 11.0928C11.1562 11.0963 11.1562 11.098 11.1562 11.098ZM4.59375 1.37499H1.78125C1.53261 1.37499 1.29415 1.47376 1.11834 1.64958C0.942522 1.82539 0.84375 2.06385 0.84375 2.31249V11.6875C0.84375 11.9361 0.942522 12.1746 1.11834 12.3504C1.29415 12.5262 1.53261 12.625 1.78125 12.625H4.59375C4.84239 12.625 5.08085 12.5262 5.25666 12.3504C5.43248 12.1746 5.53125 11.9361 5.53125 11.6875V2.31249C5.53125 2.06385 5.43248 1.82539 5.25666 1.64958C5.08085 1.47376 4.84239 1.37499 4.59375 1.37499ZM1.78125 2.31249H4.59375V3.24999H1.78125V2.31249ZM4.59375 11.6875H1.78125V10.75H4.59375V11.6875Z"
                                                            fill="#2FBE46" />
                                                    </svg>
                                                    {{ $book->book_left - $book->book_quantity }} / {{ $book->book_quantity }}
                                                </div>
                                            </div>
                                            <div class="right-area">
                                                <button type="button" class="borrow-button" data-toggle="modal"
                                                    data-target="#exampleModal{{ $book->id }}">
                                                    Pinjam
                                                </button>
                                            </div>
                                        </div>
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
                                                                <p class="book-synopsis">
                                                                    {{ $book->synopsis }}
                                                                </p>
                                                                <div class="inner-flex-area">
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
                                                                                02 / 05
                                                                            </p>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="borrow-button btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#borrowModal{{ $book->id }}">
                                                            Pinjam
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal modal-borrow-book confirmation-modal fade" id="borrowModal{{ $book->id }}" tabindex="-1"
                                            aria-labelledby="borrowModal{{ $book->id }}" aria-hidden="true">
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="82"
                                                                height="82" viewBox="0 0 82 82" fill="none">
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
                                                                Durasi waktu peminjaman maksimal 7 hari, jika lebih secara otomatis buku pinjaman akan kembali ke katalog.
                                                            </p>
                                                            <button class="cancel-button">
                                                                Tidak
                                                            </button>
                                                            <button class="confirm-button">
                                                                Ya
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
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

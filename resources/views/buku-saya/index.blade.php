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
                            <a href="{{ route('bukuSaya.index') }}" class="menu-link {{ Request::is('buku-saya') ? 'active-link' : '' }}">
                                <p class="category-text">
                                    Buku Saya
                                </p>
                            </a>
                            <a href="{{ route('bukuFavorit') }}" class="menu-link {{ Request::is('buku-favorit') ? 'active-link' : 'awikwok' }}">
                                <p class="category-text">
                                    Buku Favorit
                                </p>
                            </a>
                            <a href="{{ route('riwayatPinjam') }}" class="menu-link {{ Request::is('riwayat-pinjam') ? 'active-link' : 'awikwok' }}">
                                <p class="category-text">
                                    Riwayat Pinjaman
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
                                        <img src="{{ asset('storage/' . $book->book->gambar_buku) }}" alt=""
                                            class="book-image">
                                    </div>
                                    <div class="right-item">
                                        <a href="{{ route('bukuSaya.bacaBuku', ['book_id' => $book->book->id]) }}"
                                            class="book-title" style="color: #000">
                                            {{ \Illuminate\Support\Str::limit($book->book->nama_buku, 57, '...') }}
                                        </a>

                                        <p class="writer-name-badge">
                                            {{ $book->book->pengarang }}
                                        </p>
                                        @if ($book->reading_status !== 'dikembalikan')
                                        <div class="flex-area">
                                            <div class="first-area">
                                                <div class="badge">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="lucide lucide-eye">
                                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                    <p>
                                                        {{ $book->reading_status }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="left-area">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16"
                                                    viewBox="0 0 15 16" fill="none">
                                                    <path
                                                        d="M13.5942 8.50743C13.4946 9.66523 13.0664 10.7705 12.36 11.6932C11.6535 12.6159 10.6983 13.3177 9.6066 13.7159C8.5149 14.1142 7.33217 14.1923 6.19755 13.9412C5.06293 13.6901 4.02363 13.1202 3.20192 12.2985C2.38021 11.4768 1.81028 10.4375 1.55917 9.30287C1.30807 8.16825 1.38624 6.98551 1.78449 5.89381C2.18274 4.80211 2.8845 3.84686 3.80721 3.14045C4.72992 2.43404 5.83519 2.00584 6.99299 1.90626C7.05454 1.90118 7.1165 1.90827 7.17531 1.92714C7.23413 1.946 7.28865 1.97627 7.33577 2.0162C7.38289 2.05614 7.42168 2.10497 7.44993 2.15989C7.47818 2.21482 7.49533 2.27478 7.50041 2.33633C7.50549 2.39789 7.49839 2.45985 7.47953 2.51866C7.46066 2.57748 7.4304 2.632 7.39046 2.67912C7.35052 2.72624 7.3017 2.76503 7.24677 2.79328C7.19184 2.82152 7.13189 2.83868 7.07033 2.84376C6.0904 2.92795 5.1549 3.29028 4.37391 3.88811C3.59292 4.48594 2.99892 5.2944 2.66181 6.21836C2.3247 7.14232 2.2585 8.14335 2.471 9.10366C2.68351 10.064 3.16587 10.9436 3.86134 11.6391C4.55681 12.3345 5.43644 12.8169 6.39675 13.0294C7.35706 13.2419 8.35809 13.1757 9.28205 12.8386C10.206 12.5015 11.0145 11.9075 11.6123 11.1265C12.2101 10.3455 12.5725 9.41001 12.6567 8.43008C12.6669 8.30576 12.7261 8.19061 12.8213 8.10995C12.9165 8.0293 13.0398 7.98975 13.1641 8.00001C13.2884 8.01026 13.4036 8.06948 13.4842 8.16464C13.5649 8.2598 13.6044 8.38311 13.5942 8.50743ZM7.03166 4.71876V8.00001C7.03166 8.12433 7.08104 8.24355 7.16895 8.33146C7.25686 8.41937 7.37609 8.46876 7.50041 8.46876H10.7817C10.906 8.46876 11.0252 8.41937 11.1131 8.33146C11.201 8.24355 11.2504 8.12433 11.2504 8.00001C11.2504 7.87569 11.201 7.75646 11.1131 7.66855C11.0252 7.58064 10.906 7.53126 10.7817 7.53126H7.96916V4.71876C7.96916 4.59444 7.91977 4.47521 7.83186 4.3873C7.74396 4.29939 7.62473 4.25001 7.50041 4.25001C7.37609 4.25001 7.25686 4.29939 7.16895 4.3873C7.08104 4.47521 7.03166 4.59444 7.03166 4.71876ZM9.37541 3.31251C9.51447 3.31251 9.65041 3.27127 9.76604 3.19401C9.88167 3.11675 9.97179 3.00693 10.025 2.87846C10.0782 2.74998 10.0922 2.6086 10.065 2.47221C10.0379 2.33581 9.97093 2.21053 9.87259 2.1122C9.77426 2.01386 9.64897 1.9469 9.51258 1.91977C9.37619 1.89264 9.23481 1.90656 9.10633 1.95978C8.97785 2.013 8.86804 2.10312 8.79078 2.21875C8.71352 2.33437 8.67228 2.47032 8.67228 2.60938C8.67228 2.79586 8.74636 2.9747 8.87822 3.10657C9.01008 3.23843 9.18893 3.31251 9.37541 3.31251ZM11.4848 4.71876C11.6238 4.71876 11.7598 4.67752 11.8754 4.60026C11.991 4.523 12.0812 4.41318 12.1344 4.28471C12.1876 4.15623 12.2015 4.01485 12.1744 3.87846C12.1473 3.74207 12.0803 3.61678 11.982 3.51845C11.8836 3.42011 11.7583 3.35315 11.622 3.32602C11.4856 3.29889 11.3442 3.31281 11.2157 3.36603C11.0872 3.41925 10.9774 3.50937 10.9002 3.625C10.8229 3.74062 10.7817 3.87657 10.7817 4.01563C10.7817 4.20211 10.8557 4.38095 10.9876 4.51282C11.1195 4.64468 11.2983 4.71876 11.4848 4.71876ZM12.891 6.82813C13.0301 6.82813 13.166 6.78689 13.2817 6.70963C13.3973 6.63237 13.4874 6.52256 13.5406 6.39408C13.5939 6.2656 13.6078 6.12423 13.5806 5.98783C13.5535 5.85144 13.4866 5.72616 13.3882 5.62782C13.2899 5.52949 13.1646 5.46252 13.0282 5.43539C12.8918 5.40826 12.7504 5.42219 12.622 5.4754C12.4935 5.52862 12.3837 5.61874 12.3064 5.73437C12.2291 5.85 12.1879 5.98594 12.1879 6.12501C12.1879 6.31149 12.262 6.49033 12.3938 6.62219C12.5257 6.75405 12.7046 6.82813 12.891 6.82813Z"
                                                        fill="#EE0000" />
                                                </svg>
                                                @php
                                                $returnedAt = \Carbon\Carbon::parse($book->returned_at);
                                                $daysLeft = now()->diffInDays($returnedAt, false);
                                                @endphp

                                                <!-- Display the number of days left -->
                                                <p>{{ $daysLeft }} Hari lagi</p>
                                            </div>
                                            <div class="right-area">
                                                <a href="#" class="return-button" data-book-id="{{ $book->book->id }}">
                                                    Return
                                                </a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="flex-area returned-book">
                                            <div class="first-area">
                                                <div class="badge">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="lucide lucide-eye">
                                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                    <p>
                                                        {{ $book->reading_status }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
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
    @section('js')
            <script>
                $(document).ready(function () {
                    $('.return-button').on('click', function () {
                        var bookId = $(this).data('book-id');

                        // Send AJAX request to return the book
                        $.ajax({
                            url: '{{ route("bukuSaya.return") }}',
                            method: 'POST',
                            data: {
                                book_id: bookId,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                // Handle success response
                                console.log(response);
                                // Reload the page after successfully returning the book
                                window.location.reload();
                            },
                            error: function (xhr, status, error) {
                                // Handle error response
                                console.error(xhr.responseText);
                            }
                        });
                    });
                });

            </script>
    @endsection
@endsection

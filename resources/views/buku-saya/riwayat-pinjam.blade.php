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
                                <form class="form-inline my-2 my-lg-0" id="form-filter">
                                    <div class="d-flex w-100" style="gap: 5px">
                                        <input type="hidden" name="order" id="order">
                                        <input class="search-input form-control w-100" type="search" placeholder="Search" name="search" value="{{ request('search') }}" aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <div class="">
                                    <select id="exampleFormControlSelect1" onchange="$('#order').val(this.value); $('#form-filter').submit();">
                                        <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Urutkan dari yang terbaru</option>
                                        <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Urutkan dari awal</option>
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
                            Riwayat Pinjam
                            </h3>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Reason</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($activityLogs as $key => $item)
                                            <tr>
                                                <td>{{ $activityLogs->firstItem() + $key }}</td>
                                                <td>{{ $item->causer?->nama_lengkap }}</td>
                                                <td>{{ $item->created_at->format('d F Y H:i') }}</td>
                                                <td>{{ $item->description }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No data available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex">
                                {{ $activityLogs->links() }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

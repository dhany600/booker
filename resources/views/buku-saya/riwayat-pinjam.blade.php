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
                            Riwayat Pinjam
                            </h3>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Reason</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>183</td>
                                            <td>John Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-success">Approved</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Alexander Pierce</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-warning">Pending</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>657</td>
                                            <td>Bob Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-primary">Approved</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>175</td>
                                            <td>Mike Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-danger">Denied</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

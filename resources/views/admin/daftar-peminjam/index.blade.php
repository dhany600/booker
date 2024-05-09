@extends('admin.layouts.main')

@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            Daftar Peminjam
                        </h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
                @endif
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-body p-0">
                    <a href="{{ route('admin.book.create') }}" class="btn btn-sm btn-success mb-2">
                        Tambah Data
                    </a>
                    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Buku</th>
                                <th>Peminjam</th>
                                <th>Status Peminjaman</th>
                                <th>Tanggal Pinjam</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    @section('js')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {
                var table = $('#tbl_list').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route("daftarPeminjam.index") }}',
                        type: 'GET', // or 'POST' depending on your route definition
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'book.nama_buku',
                            name: 'book.nama_buku'
                        }, // Access nested property
                        {
                            data: 'user.nama_lengkap',
                            name: 'user.nama_lengkap'
                        }, // Access nested property
                        {
                            data: 'reading_status',
                            name: 'reading_status'
                        }, // Access nested property
                        {
                            data: 'created_at',
                            name: 'created_at',
                            render: function (data) {
                                // Format the date as year-month-day
                                var date = new Date(data);
                                return date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
                            }
                        }, // Access nested property
                    ],
                });
            });

        </script>
    @endsection
@endsection
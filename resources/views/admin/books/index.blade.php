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
                            Book List
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
                                <th>Stock Buku</th>
                                {{-- <th>Favorit</th> --}}
                                <th>Action</th>
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
                    ajax: '{{ route("admin.book.index") }}',
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'nama_buku',
                            name: 'nama_buku'
                        },
                        {
                            data: 'synopsis',
                            name: 'synopsis'
                        },
                        // {
                        //     data: 'nama_buku',
                        //     name: 'nama_buku'
                        // },
                        {
                            data: 'actions',
                            name: 'actions'
                        },
                    ],
                });
            });

            $(document).on('click', '.delete-book', function() {
                var bookId = $(this).data('id');
                if (confirm("Are you sure you want to delete this book?")) {
                    $.ajax({
                        url: '/admin/book/' + bookId,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                // Reload the table or update UI as needed
                                alert(response.message);
                            } else {
                                alert(response.message);
                            }
                            location.reload()
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });

            
        </script>
    @endsection
@endsection
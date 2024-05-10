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
                            Detail Buku
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('admin.book.edit', $books->id) }}" class="btn btn-primary">
                            Edit
                        </a>
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
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-12 row">
                                <div class="mb-3 col-md-6">
                                    <h3 class="dashboard-title mb-0 h4 font-weight-bold">
                                        Nama Buku
                                    </h3>
                                    <p class="content-text mb-1">
                                        {{ $books->nama_buku }}
                                    </p>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <h3 class="dashboard-title mb-0 h4 font-weight-bold">
                                        Sinopsis
                                    </h3>
                                    <p class="content-text mb-1">
                                        {{ $books->synopsis }}
                                    </p>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <h3 class="dashboard-title mb-0 h4 font-weight-bold">
                                        Pengarang
                                    </h3>
                                    <p class="content-text mb-1">
                                        {{ $books->pengarang }}
                                    </p>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <h3 class="dashboard-title mb-1 h4 font-weight-bold">
                                        Product Image
                                    </h3>
                                    <div class="col-md-11 p-0">
                                        <img src="{{ asset('storage/' . $books->gambar_buku) }}" alt=""
                                            class="image-fluid w-100" />
                                    </div>


                                </div>
                                <div class="mb-3 col-md-6">
                                    <h3 class="dashboard-title mb-0 h4 font-weight-bold">
                                        Book Stock
                                    </h3>
                                    <p class="content-text mb-1">
                                        {{ $books->book_left }} / {{ $books->book_quantity }}
                                    </p>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <h3 class="dashboard-title mb-0 h4 font-weight-bold">
                                        Category
                                    </h3>
                                    @foreach($books->categories as $category)
                                    <p class="content-text mb-1">
                                        {{ $category->nama_kategori }}
                                    </p>
                                    @endforeach
                                </div>
                                <div class="mb-3 col-md-6">
                                    <h3 class="dashboard-title mb-0 h4 font-weight-bold">
                                        Date Created
                                    </h3>
                                    <p class="content-text mb-1">
                                        {{ $books->created_at }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    @section('js')
        <script>
        </script>
    @endsection
@endsection
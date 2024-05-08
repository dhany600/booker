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
                            Buku
                        </h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Buku</h3>
                </div>
                <div class="card-body p-0">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-8">
                                <form action="{{ route('admin.book.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama_buku" class="form-label">
                                            Nama Buku
                                        </label>
                                        <input type="text" class="form-control @error('nama_buku') is-invalid @enderror"
                                            id="nama_buku" name="nama_buku" value="{{ old('nama_buku') }}" autofocus>
                                        @error('nama_buku')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="synopsis" class="form-label">
                                            Synopsis
                                        </label>
                                        <input type="text" class="form-control @error('synopsis') is-invalid @enderror"
                                            id="synopsis" name="synopsis" value="{{ old('synopsis') }}" autofocus>
                                        @error('synopsis')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="pengarang" class="form-label">
                                            Pengarang
                                        </label>
                                        <input type="text" class="form-control @error('pengarang') is-invalid @enderror"
                                            id="pengarang" name="pengarang" value="{{ old('pengarang') }}" autofocus>
                                        @error('pengarang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- input image here --}}
                                    <div class="mb-3">
                                        <label for="gambar_buku" class="form-label" style="display: block">
                                            Gambar Buku
                                        </label>
                                        <img class="img-preview img-fluid mb-3 w-75">
                                        <input class="form-control @error('gambar_buku') is-invalid @enderror" type="file"
                                            id="gambar_buku" name="gambar_buku" onchange="previewImage()" accept="image/*">
                                        @error('gambar_buku')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- pdf buku --}}
                                    <div class="mb-3">
                                        <label for="pdf_buku" class="form-label" style="display: block">
                                            PDF Buku
                                        </label>
                                        <input class="form-control @error('pdf_buku') is-invalid @enderror" type="file"
                                            id="pdf_buku" name="pdf_buku" accept="application/pdf">
                                        @error('pdf_buku')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="book_quantity" class="form-label">
                                            Jumlah Buku
                                        </label>
                                        <input type="text" class="form-control @error('book_quantity') is-invalid @enderror"
                                            id="book_quantity" name="book_quantity" value="{{ old('book_quantity') }}" autofocus>
                                        @error('book_quantity')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Kategori</label>
                                        <select name="category_id" id="category_id" class="w-100 form-control">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        Create Post
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @section('js')
    <script>
        $(document).ready(function () {
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
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle errors, e.g., show an error message
                    }
                });
            });
        });
    </script>

    @endsection
@endsection
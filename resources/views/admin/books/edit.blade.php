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
                                <form action="{{ route('admin.book.update', $books->id) }}" method="POST"
                                    style="width: 100%;" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="nama_buku" class="form-label">Nama Buku</label>
                                            <input type="text" class="form-control" id="nama_buku" name="nama_buku"
                                                value="{{ $books->nama_buku }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="synopsis" class="form-label">Sinopsis</label>
                                            <textarea class="form-control" id="synopsis"
                                                name="synopsis">{{ $books->synopsis }}</textarea>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="pengarang" class="form-label">Pengarang</label>
                                            <input type="text" class="form-control" id="pengarang" name="pengarang"
                                                value="{{ $books->pengarang }}">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="gambar_buku" class="form-label">Gambar Buku</label>
                                            <input type="file" class="form-control" id="gambar_buku" name="gambar_buku"
                                                onchange="previewImage(event)">
                                            @if ($books->gambar_buku)
                                            <img id="preview" src="{{ asset('storage/' . $books->gambar_buku) }}"
                                                alt="Book Image" class="img-thumbnail mt-2" style="max-height: 200px;">
                                            @endif
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="categories" class="form-label">Categories</label>
                                            <div class="category-flex-area">
                                                @foreach($categories as $category)
                                                <div class="category-flex-container">
                                                    <input class="input-checkbox-square" type="checkbox"
                                                        id="category_{{ $category->id }}" name="categories[]"
                                                        value="{{ $category->id }}"
                                                        @if($books->categories->contains($category->id)) checked @endif>
                                                    <label class="input-checkbox-label"
                                                        for="category_{{ $category->id }}">{{ $category->nama_kategori }}</label><br>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
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
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function () {
                    var output = document.getElementById('preview');
                    output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>

    @endsection
@endsection
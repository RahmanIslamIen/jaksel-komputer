@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>tambah produk
                            <a href="{{ url('/data-produk') }}" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('tambah-produk') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="">gambar produk</label>
                                <input type="file" name="gambar" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">nama produk</label>
                                <input type="text" name="nama_produk" required class="course form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">kategori</label>
                                <input type="text" name="kategori" required class="course form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">deskripsi</label>
                                <input type="text" name="deskripsi" required class="course form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">stok</label>
                                <input type="number" name="stok" required class="course form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">harga</label>
                                <input type="number" name="harga" required class="course form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan Produk</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

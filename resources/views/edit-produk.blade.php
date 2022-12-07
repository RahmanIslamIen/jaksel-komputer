@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update Student
                            <a href="{{ url('/data-produk') }}" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('edit-produk/' . $produk->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <img src="{{ url('gambar_produk/' . $produk->gambar) }}" width="500" height="500">
                                <p>{!! $produk->gambar !!}</p>
                                <label for="">gambar</label>
                                <input type="file" name="gambar" value="{{ $produk->gambar }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">nama produk</label>
                                <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">kategori</label>
                                <input type="text" name="kategori" value="{{ $produk->kategori }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">deskripsi</label>
                                <input type="text" name="deskripsi" value="{{ $produk->deskripsi }}"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">stok</label>
                                <input type="number" name="stok" value="{{ $produk->stok }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">harga</label>
                                <input type="number" name="harga" value="{{ $produk->harga }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Perbaharui Produk</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

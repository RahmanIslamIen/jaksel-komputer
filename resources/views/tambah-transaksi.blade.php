@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Beli Produk
                            <a href="{{ url('/') }}" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('tambah-transaksi/' . $buatTransaksi->id) }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <img src="{{ url('gambar_produk/' . $buatTransaksi->gambar) }}" width="500"
                                    height="500">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">nama</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">nama produk</label>
                                <input type="text" name="nama_produk" value="{{ $buatTransaksi->nama_produk }}"
                                    class="form-control">
                                <input type="hidden" name="gambar" value="{{ $buatTransaksi->gambar }}"
                                    class="form-control">
                                <input type="hidden" name="kategori" value="{{ $buatTransaksi->kategori }}"
                                    class="form-control">
                                <input type="hidden" name="deskripsi" value="{{ $buatTransaksi->deskripsi }}"
                                    class="form-control">
                                <input type="hidden" name="stok" value="{{ $buatTransaksi->stok }}"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">jumlah beli</label>
                                <input type="number" name="jumlah_beli" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">harga</label>
                                <input type="number" name="harga" value="{{ $buatTransaksi->harga }}"
                                    class="form-control">
                            </div>

                            <input type="hidden" name="total_harga" class="form-control">
                            <input type="hidden" name="id" value="{{ $buatTransaksi->id }}" class="form-control">

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

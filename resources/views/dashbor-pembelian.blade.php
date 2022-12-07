@extends('layouts.app')

@section('content')
    <div class="container">

        <center>
            <img src="https://fantech.id/media/Banner-FID/November/WEB_BANNER.jpg" class="card-img-top m-4" width="1208"
                height="302">
        </center>


        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($produk as $item)
                <div class="col">
                    <div class="card">
                        <img src="{{ url('gambar_produk/' . $item->gambar) }}" class="card-img-top" width="259"
                            height="259">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_produk }}</h5>
                            <h3 class="card-text">Rp.{{ $item->harga }}</h3>
                            @if (Auth::user()->saldo < $item->harga)
                                <span class="badge text-bg-danger">saldo anda kurang</span>
                            @endif
                            <p class="card-text">Stok Barang {{ $item->stok }}</p>
                            <a href="{{ url('tambah-transaksi/' . $item->id) }}" class="btn btn-success">Beli
                                <i class="nav-icon fas fa-cart-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

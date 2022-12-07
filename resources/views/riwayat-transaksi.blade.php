@extends('layouts.app')

@section('content')
    <div class="m-2">
        <h1>Riwayat Transaksi Anda</h1>
    </div>
    <div class="m-2">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">nama pembeli</th>
                    <th scope="col">email</th>
                    <th scope="col">nama produk</th>
                    <th scope="col">jumlah beli</th>
                    <th scope="col">harga</th>
                    <th scope="col">total harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataTransaksi as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->jumlah_beli }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->total_harga }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

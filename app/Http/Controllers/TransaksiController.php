<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $status = Auth::user()->roles;
        if($status == 'pengguna'){
            return redirect()->back();
        }
        $dataTransaksi = Transaksi::all();
        return view('data-transaksi', compact('dataTransaksi'));
    }

    public function riwayatTransaksi()
    {
        $dataTransaksi = Transaksi::where('email', Auth::user()->email)->get();
 
        return view('riwayat-transaksi', compact('dataTransaksi'));
    }

    public function masukTransaksi($id)
    {
        $buatTransaksi = Produk::find($id);
        return view('tambah-transaksi', compact('buatTransaksi'));
    }

    public function buatTransaksi(Request $request)
    {
        //tambah transaksi
        $buatTransaksi = new Transaksi;
        $buatTransaksi->name = Auth::user()->name;
        $buatTransaksi->email = Auth::user()->email;
        $buatTransaksi->nama_produk = $request->input('nama_produk');
        $buatTransaksi->jumlah_beli = $request->input('jumlah_beli');
        $buatTransaksi->harga = $request->input('harga');
        $harga = $request->input('harga');
        $jumlah_beli = $request->input('jumlah_beli');
        $buatTransaksi->total_harga = $harga * $jumlah_beli;

        $buatTransaksi->save();

        return redirect()->back();
    }

    public function perbaharuiStok(Request $request, $id)
    {
        $buatTransaksi = Produk::find($id);
        $buatTransaksi->gambar = $request->input('gambar');
        $buatTransaksi->nama_produk = $request->input('nama_produk');
        $buatTransaksi->kategori = $request->input('kategori');
        $buatTransaksi->deskripsi = $request->input('deskripsi');

        $jumlah_beli = $request->input('jumlah_beli');
        $stok = $request->input('stok');
        $sisaStok = $stok - $jumlah_beli;
        $buatTransaksi->stok = $sisaStok;

        $buatTransaksi->harga = $request->input('harga');
        $buatTransaksi->update();
        return redirect()->back();
    }

    public function ambilSaldo(Request $request)
    {
        $id = Auth::user()->id;
        $buatTransaksi = User::find($id);
        $buatTransaksi->name = Auth::user()->name;
        $buatTransaksi->email = Auth::user()->email;
        $buatTransaksi->alamat = Auth::user()->alamat;

        $harga = $request->input('harga');
        $saldo = Auth::user()->saldo;
        $sisaUang = $saldo - $harga;
        $buatTransaksi->saldo = $sisaUang;
        
        $buatTransaksi->update();
        return redirect()->back();
    }
}

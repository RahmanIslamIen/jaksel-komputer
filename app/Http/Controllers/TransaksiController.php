<?php

namespace App\Http\Controllers;

use App\Models\Produk;
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
}

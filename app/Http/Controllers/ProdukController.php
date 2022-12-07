<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use PharIo\Manifest\Url;

class ProdukController extends Controller
{
    public function index()
    {
        $status = Auth::user()->roles;
        if($status == 'pengguna'){
            return redirect()->back();
        }
        $produk = Produk::all();
        return view('data-produk', compact('produk'));
    }

    public function create()
    {
        return view('tambah-produk');
    }

    public function store(Request $request)
    {
        $data_produk = new Produk();
        if($request->hasfile('gambar'))
        {
            $file = $request->file('gambar');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('gambar_produk/', $filename);
            $data_produk->gambar = $filename;
        }
        $data_produk->nama_produk = $request->input('nama_produk');
        $data_produk->kategori = $request->input('kategori');
        $data_produk->deskripsi = $request->input('deskripsi');
        $data_produk->stok = $request->input('stok');
        $data_produk->harga = $request->input('harga');

        $data_produk->save();
        return redirect()->back()->with('message','Berhasil tambah produk!');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('edit-produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $data_produk = Produk::find($id);
        if($request->hasfile('gambar'))
        {
            $file = $request->file('gambar');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('gambar_produk/', $filename);
            $data_produk->gambar = $filename;
        }
        $data_produk->nama_produk = $request->input('nama_produk');
        $data_produk->kategori = $request->input('kategori');
        $data_produk->deskripsi = $request->input('deskripsi');
        $data_produk->stok = $request->input('stok');
        $data_produk->harga = $request->input('harga');
        $data_produk->update();
        return redirect()->back()->with('status','Berhasil mengubah data produk !');
    }

    public function destroy($id)
    {
        $data_produk = Produk::find($id);
        $data_produk->delete();
        return redirect()->back()->with('status','Produk berhasil dihapus !');
    }
}

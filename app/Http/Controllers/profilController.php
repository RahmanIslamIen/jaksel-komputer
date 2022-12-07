<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use PharIo\Manifest\Url;

class profilController extends Controller
{
    public function profil()
    {
        return view('data-profil');
    }

    public function mengubahProfil()
    {
        return view('mengubah-profil');
    }

    public function updateProfil(Request $request)
    {
        $id = Auth::user()->id;
        $dataProfil = User::find($id);
        $dataProfil->name = $request->input('name');
        $dataProfil->email = $request->input('email');
        $dataProfil->alamat = $request->input('alamat');
        $dataProfil->update();
        return redirect()->back()->with('status','Berhasil mengubah profil !');
    }

}

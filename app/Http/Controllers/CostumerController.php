<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use PharIo\Manifest\Url;

class CostumerController extends Controller
{
    public function index()
    {
        $status = Auth::user()->roles;
        if($status == 'pengguna'){
            return redirect()->back();
        }
        $dataAkun = User::all();
        return view('data-costumer', compact('dataAkun'));
    }

    public function destroy($id)
    {
        $dataAkun = User::find($id);
        $dataAkun->delete();
        return redirect()->back()->with('status','Akun berhasil dihapus !');
    }
}

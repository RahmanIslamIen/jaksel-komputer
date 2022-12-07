@extends('layouts.app')

@section('content')
    <div class="m-2">
        <h1>Data Diri Profil</h1>
    </div>
    <div class="m-2">
        <p>{{ Auth::user()->name }}</p>
        <p>{{ Auth::user()->email }}</p>
        <p>{{ Auth::user()->alamat }}</p>
        <p>{{ Auth::user()->saldo }}</p>
        <a href="/mengubah-profil" class="btn btn-info">Ubah Data Profil</a>
    </div>
@endsection

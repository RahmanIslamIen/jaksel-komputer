@extends('layouts.app')

@section('content')
    <div class="m-5">
        <div class="m-2">
            <h1>Data Diri Profil</h1>
        </div>
        <div class="m-2">
            <p>{{ Auth::user()->name }}</p>
            <p>{{ Auth::user()->email }}</p>
            <p>{{ Auth::user()->alamat }}</p>
            <p>@currency(Auth::user()->saldo)</p>
            <div class="row">
                <div class="col"><a href="/mengubah-profil" class="btn btn-info">Ubah Data Profil</a></div>
                <div class="col"><a href="/top-up-saldo" class="btn btn-success">Top Up</a></div>
            </div>

        </div>
    </div>
@endsection

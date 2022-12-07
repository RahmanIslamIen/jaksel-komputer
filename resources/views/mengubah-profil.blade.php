@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Ubah Data diri profil
                            <a href="/" class="btn btn-danger float-end">KEMBALI</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update-profil/' . Auth::user()->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">nama</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" value="{{ Auth::user()->alamat }}"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">UPDATE PROFIL</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

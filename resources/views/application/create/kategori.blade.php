@extends('../../application/layouts/master')

@section('container')

<!-- Nested Row within Card Body -->
<div class="col">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Tambah Kategori!</h1>
        </div>
        @if($errors->any())
            @foreach($errors->all() as $err)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $err }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif
        @if (session()->has('createSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('createSuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('createError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('createError') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{ route('createKategori.action') }}" method="post" class="user">
            @csrf
            <div class="row align-items-center">
                <div class="col-4">Kategori</div>
                <div class="col-1">:</div>
                <div class="col">
                    <div class="form-group mt-3">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                            name="kategori" placeholder="Kategori">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="/kategori" class="btn btn-danger btn-user btn-block">
                        Batal
                    </a>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Tambah
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection    
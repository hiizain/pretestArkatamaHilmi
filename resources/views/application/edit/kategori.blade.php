@extends('../../application/layouts/masterEdit')

@section('container')

<!-- Nested Row within Card Body -->
<div class="col">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Edit Kategori!</h1>
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
        @if (session()->has('editSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('editSuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('editError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('editError') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{ route('editKategori.action') }}" method="post" class="user">
            @csrf
            <input type="hidden" name="id_kategori" value="{{ $kategori->ID_KATEGORI }}">
            <div class="row align-items-center">
                <div class="col-4">Kategori</div>
                <div class="col-1">:</div>
                <div class="col">
                    <div class="form-group mt-3">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                            name="kategori" value="{{ $kategori->KATEGORI }}">
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
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection    
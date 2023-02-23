@extends('../application/layouts/master')

@section('container')

    <!-- Page Heading -->

    <div>
        @if (session()->has('createSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('createSuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('updateSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('updateSuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('restoreSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('restoreSuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('deleteSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('deleteSuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif   
        @if (session()->has('deleteError'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('deleteError') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif   
    </div> 

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-sm-6 py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Kategori</h6>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="/createKategori" class="btn btn-primary tombol">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($kategori as $item)
                            <tr>
                                <td>{{ $item->KATEGORI }}</td>
                                <td>
                                    <a href="editKategori/{{ $item->ID_KATEGORI }}" class="btn btn-primary tombol border-0">Edit</a>
                                    <form action="{{ route('deleteKategori.action') }}" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id_kategori" value="{{ $item->ID_KATEGORI }}">
                                        <button class="btn btn-danger tombol border-0" onclick="return confirm('Akan menghapus data');">
                                            Hapus
                                        </button>
                                    </form>
                                    {{-- <a href="deleteKategori/{{ $item->ID_KATEGORI }}" class="btn btn-danger tombol border-0" onclick="return confirm('Akan menghapus data');">Hapus</a> --}}
                                    {{-- <form action="{{ route('editKategori.action') }}" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id_kategori" value="{{ $item->ID_KATEGORI }}">
                                        <button class="btn btn-primary tombol border-0">
                                            Edit
                                        </button>
                                    </form>
                                    <form action="{{ route('deleteKategori.action') }}" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id_kategori" value="{{ $item->ID_KATEGORI }}">
                                        <button class="btn btn-danger tombol border-0" onclick="return confirm('Akan menghapus data');">
                                            Hapus
                                        </button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection    

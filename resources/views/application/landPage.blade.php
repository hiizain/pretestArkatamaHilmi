@extends('../application/layouts/masterPage')

@section('container')
<div class="mt-5"></div>
<div class="mt-5 pt-5">
    <form action="{{ route('editKategori.action') }}" method="post" class="user">
        @csrf
        <div class="d-flex align-items-center justify-content-center">
            <div class="col-6">
                <h4 class="text-center">Cari Artikel yang Kamu Inginkan!</h4>
                <div class="form-group mt-3">
                    <input type="text" id="cariArtikel" class="form-control form-control-user" id="exampleInputEmail"
                        name="kategori" placeholder="Cari artikel...">
                </div>
            </div>
        </div>
    </form>
</div>
<hr>
<div class="col d-flex flex-row mt-4 p-0">
    @if(count($blog)>0)
        @foreach($blog as $item)
        <!-- Pie Chart -->
        <div class="m-2 card" style="width: 18rem;">
            {{-- <i class="bi bi-aspect-ratio-fill card-img-top"></i> --}}
            <img class="card-img-top" src="..\assets\img\1156px-Picture_icon_BLACK.svg.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $item->JUDUL }}</h5>
                <p class="card-text"><?php echo substr(strip_tags($item->konten->ISI),0,120) ?>...</p>
                <a href="/artikel/{{ $item->SLUG }}" class="btn btn-primary">Read more</a>
            </div>
        </div>
        {{-- <a href="/artikel/{{ $item->SLUG }}">
            <div class="m-2 col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">{{ $item->JUDUL }}</h4>
                        <p class="m-0 font-weight-bold text-primary"><?php echo $item->user->NAMA_BELAKANG.' > '.date('d M Y',strtotime($item->TGL_UPLOAD)) ?></h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                </div>
            </div>
        </a> --}}
        @endforeach
    @else
        <div class="d-flex align-items-center justify-content-center">
            <h3 class="text-center">Belum ada artikel yang dipublikasikan.</h3>
        </div>
    @endif

</div>

@endsection
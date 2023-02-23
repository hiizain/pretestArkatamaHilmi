@extends('../application/layouts/masterPage')

@section('container')
<div class="mt-5 pt-5">
    <div class="m-3 p-3">
        <div class="row d-flex align-items-center">
            <div class="col-8">
                <h3 class="row m-0">{{ $blog->JUDUL }}</h3>
            </div>
            <div class="col-4 justify-content-end">
                <p class="row m-0 justify-content-end text-end"><?= $blog->user->NAMA_BELAKANG.' '.$blog->user->NAMA_DEPAN ?></p>
                <p class="row m-0 justify-content-end text-end"><?php echo date('d M Y',strtotime($blog->TGL_UPLOAD))?></p>
            </div>
        </div>
        <hr>
        <div class="mt-3" id="isiKonten">@if ($konten !== null) <?= $konten->ISI ?> @else <h4 class="mt-5 card-text text-center font-italic">Belum ada konten</h4> @endif</div>
    </div>
</div>

@endsection
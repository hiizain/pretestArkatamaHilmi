@extends('../application/layouts/masterPage')

@section('container')
<div class="mt-5 pt-5">
    <div class="m-3 p-3">
        <div class="row">
            <div class="col-8">
                <h3 class="row m-0">{{ $blog->JUDUL }}</h3>
            </div>
            <div class="col-4">
                <p class="row m-0 text-end"><?= $blog->user->NAMA_BELAKANG.' '.$blog->user->NAMA_DEPAN ?></p>
                <p class="row m-0 text-end"><?php echo date('d M Y',strtotime($blog->TGL_UPLOAD))?></p>
            </div>
        </div>
        <hr>
        <div class="mt-3" id="isiKonten"><?= $konten->ISI ?></div>
    </div>
</div>

@endsection
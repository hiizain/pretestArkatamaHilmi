@extends('../application/layouts/master')

@section('container')

<div class="container mt-5">
    <div class="row">
        <h1>
            My Blogs
        </h1>
    </div>
    <div class="row">
        {{-- <a href="/createBlog" class="btn btn-primary tombol">Blog Baru</a> --}}
        <button type="button" id="blogBaru" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Blog Baru</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Blog Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ route('createBlog.action') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="idUser" value="{{ $user->ID_USER }}">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Judul :</label>
                        <input type="text" class="form-control" name="judul" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kategori :</label>
                        <select class="form-control" name="kategori" id="listKategori">
                            <option value="" hidden>Pilih Kategori</option>
                        </select>
                        <script>
                            var cek = document.getElementById('listKategori')
                            cek.onclick = function(){
                                console.log('cek')
                                $.ajax({
                                    url: "/getKategori",
                                    type: 'GET',
                                    dataType: 'json', // added data type
                                    success: function(res) {
                                        tampilanKategori = ``;
                                        console.log(res.length)
                                        if (res.length !== 0) {
                                            $.each(res, function(key, item) {
                                                console.log(item)
                                                tampilanKategori +=
                                                `
                                                    <option value="`+ item['ID_KATEGORI'] +`">` + item['KATEGORI'] + `</option>
                                                `;
                                            });
                                        } else {
                                            tampilanKategori +=
                                                `
                                            <li class="row mx-1 my-2">
                                                <h6 class="col-9 p-0 m-0 d-flex align-items-center">
                                                    Belum ada data
                                                </h6>
                                            </li>
                                            `;
                                        }
                                        console.log(tampilanKategori);
                                        $('#listKategori').html(tampilanKategori);
                                        $('#listKategories').html('halo');
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col mt-3 p-0">
            <div class="row">
            {{-- <ul class="m-0 p-0"> --}}
                @if($blogs)
                    @foreach($blogs as $item)
                        <div class="col-3 p-2">
                        <div class="mx-1 my-2 card">
                            {{-- <i class="bi bi-aspect-ratio-fill card-img-top"></i> --}}
                            <img class="card-img-top" src="..\assets\img\1156px-Picture_icon_BLACK.svg.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php if(Str::length($item->JUDUL)>=30){ echo substr($item->JUDUL,0,30).'...'; } else echo $item->JUDUL;?></h5>
                                <p class="card-text">{{ $item->kategori->KATEGORI }}</p>
                                <p class="card-text">
                                    <?php
                                        if($item->ID_KONTEN !== null){
                                            echo substr(strip_tags($item->konten->ISI),0,50).' ...';
                                        } else{
                                        ?>
                                            <p class="card-text font-italic">Belum ada konten</p>
                                        <?php
                                        }
                                    ?>
                                </p>
                                <a href="/editBlog/{{ $item->ID_BLOG }}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                        </div>
                    @endforeach
                @endif
            {{-- </ul> --}}
            </div>
        </div>
        
    </div>
</div> 

@endsection
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
                    {{-- <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kategori :</label>
                        <select name="kategori" id="listKategori">
                            
                        </select>
                        <script>
                            // var cek = document.getElementById('listKategori').on('click', function () {
                            //     var Status = $(this).val();
                            //     $.ajax({
                            //         url: 'Ajax/StatusUpdate.php',
                            //         data: {
                            //             text: $("textarea[name=Status]").val(),
                            //             Status: Status
                            //         },
                            //         dataType : 'json'
                            //     });
                            // });
                            var cek = document.getElementById('listKategori')
                            cek.onclick = function(){
                                console.log('cek')
                                $.ajax({
                                    url: "/getKategori",
                                    type: 'GET',
                                    dataType: 'json', // added data type
                                    success: function(res) {
                                        tampilanKategori = ``;
                                        console.log(res)
                                        if (res['kategori'] !== null) {
                                            console.log(res['kategori'])
                                            $.each(res, function(key, item) {
                                                tampilanKategori +=
                                                    `
                                                <li class="row mx-1 my-2">
                                                    <div class="col-1 text-center d-flex align-items-center mx-2">
                                                        <input type="checkbox" id="kategori`+ item['ID_KATEGORI'] +`" name="kategori" value="`+ item['ID_KATEGORI'] +`">
                                                    </div>
                                                    <h6 class="col-9 p-0 m-0 d-flex align-items-center">
                                                        <label for="kategori` + item['ID_KATEGORI'] + `"> ` + item['KATEGORI'] + `</label>
                                                    </h6>
                                                </li>
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

                                        $('#listKategori').html(tampilanKategori);
                                    }
                                });
                            }
                        </script>
                    </div> --}}
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
        <div class="col d-flex flex-row mt-3 p-0">
            {{-- <ul class="m-0 p-0"> --}}
                @if($blogs)
                    @foreach($blogs as $item)
                        <div class="m-2 card" style="width: 18rem;">
                            {{-- <i class="bi bi-aspect-ratio-fill card-img-top"></i> --}}
                            <img class="card-img-top" src="..\assets\img\1156px-Picture_icon_BLACK.svg.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->JUDUL }}</h5>
                                <p class="card-text">{{ $item->kategori->KATEGORI }}</p>
                                <p class="card-text">
                                    <?php
                                        if($item->ID_KONTEN !== null){
                                            echo substr(strip_tags($item->konten->ISI),0,50).' ...';
                                        } else echo '...'
                                    ?>
                                </p>
                                <a href="/editBlog/{{ $item->ID_BLOG }}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            {{-- </ul> --}}
        </div>
        
    </div>
</div> 

@endsection
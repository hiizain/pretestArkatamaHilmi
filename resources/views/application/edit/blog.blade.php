@extends('../application/layouts/masterEdit')

@section('container')

<div class="container mt-5">
    <!-- Earnings (Monthly) Card Example -->
    <div class="card shadow h-100 py-2">
        <div class="card-body row align-items-center">
            <div class="col m-0 p-0">
                <div class="row mx-3">
                    <div class="col-9">
                        <div class="row">
                            <div class="col-2">URL</div>
                            <div class="col-1">:</div>
                            <div class="col">
                                <a href="{{ $base_url.'/'.$blog->SLUG }}" class="m-0 p-0" target="_blank">{{ $base_url.'/'.$blog->SLUG }}</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">Author</div>
                            <div class="col-1">:</div>
                            <div class="col">{{ $blog->user->NAMA_BELAKANG.' '.$blog->user->NAMA_DEPAN }}</div>
                        </div>
                    </div>
                    <div class="col-3 text-right">
                        <a @if($blog->STATUS_PUBLISH ==! '1') href="/publishBlog/{{ $blog->ID_BLOG }}" @endif id="publish" class="btn @if($blog->STATUS_PUBLISH ==! '1') btn-success @else btn-secondary @endif tombol mx-1">Publish</a>
                        <a @if($blog->STATUS_PUBLISH ==! '0') href="/takeDownBlog/{{ $blog->ID_BLOG }}" @endif id="takeDown" class="btn  @if($blog->STATUS_PUBLISH ==! '0') btn-danger @else btn-secondary @endif tombol mx-1">Take Down</a>
                        {{-- <button id="publish" class="btn @if($blog->STATUS_PUBLISH === '1') btn-secondary @else btn-success @endif tombol mx-1">Publish</button>
                        <button id="takeDown" class="btn  @if($blog->STATUS_PUBLISH === '0') btn-secondary @else btn-danger @endif tombol mx-1">Take Down</button> --}}
                    </div>
                    {{-- <script>
                        var publish = document.getElementById('publish')
                        publish.onclick = function(){
                            console.log('cek')
                            $.ajax({
                                url: '/publishBlog/'+{{ $blog->ID_BLOG }},
                                type: 'GET',
                                // dataType: 'json', // added data type
                                success: function(res) {
                                    console.log(res)
                                }
                            })
                        }
                    </script> --}}
                </div>
                <hr>
                <form method="post" action="/createKonten" enctype="multipart/form-data">
                    @csrf
                    <div class="row mx-3">
                        {{-- <div class="col" id="editor">

                        </div> --}}
                            <div class="col form-group">
                                <input type="hidden" value="{{ $blog->ID_BLOG  }}" name="idBlog">
                                <textarea class="ckeditor form-control" name="isiKonten">
                                    @if($konten !== '')
                                        {{ $konten->ISI }}
                                    @endif
                                </textarea>
                            </div>
                        {{-- <div class="col form-group">
                            <textarea class="form-control ckeditor" style="height: 500px">
                                @if($konten !== '')
                                {{ $konten->ISI }}
                                @endif
                            </textarea>
                        </div> --}}
                    </div>
                    <div class="row mx-3">
                        <div class="col text-right">
                            <button type="submit" class="btn btn-success tombol mx-1">Simpan</button>
                            <a href="/blog" class="btn btn-danger tombol mx-1">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> --}}
{{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}
{{-- <script>
    // $(document).ready(function () {
    //     $('.ckeditor').ckeditor();
    // });
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

</script> --}}
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<script type="text/javascript">
    CKEDITOR.replace('isiKonten', {
        filebrowserUploadUrl: "{{route('konten.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>


@endsection
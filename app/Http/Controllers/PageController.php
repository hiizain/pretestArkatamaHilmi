<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel as Kategori;
use App\Models\BlogModel as Blog;
use App\Models\KontenModel as Konten;

class PageController extends Controller
{
    public function index(){
        $data['title'] = 'Home Page';
 
        $blog = Blog::where('status_publish', '1')->get();
        return view('application/landPage', ['data' => $data, 'blog' => $blog]);
    }

    public function getArtikel(Request $request){
        var_dump($request);
        $blog = Blog::where('status_publish', '1')->where('judul', 'like', $request->search)->get();
        foreach($blog as $item){
        ?>
            <div class="col-3 p-2">
                <div class="mx-1 my-2 card">
                    <img class="card-img-top" src="..\assets\img\1156px-Picture_icon_BLACK.svg.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php if(strlen($item->JUDUL)>=30){ echo substr($item->JUDUL,0,30).'...'; } else echo $item->JUDUL;?></h5>
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
                        <a href="/artikel/{{ $item->SLUG }}" class="btn btn-primary" target="_blank">Read more</a>
                    </div>
                </div>
            </div>
        <?php
        }
        // return $blog;
    }

    public function artikel($slug){
        $data['title'] = 'Artikel';
        $blog = Blog::where('slug', $slug)->first();
        $konten = '';
        if(Blog::where('slug', $slug)->where('status_publish', '1')->first()){
            $konten = Konten::where('id_konten', $blog->ID_KONTEN)->first();
            return view('application/artikel', ['data' => $data, 'konten' => $konten, 'blog' => $blog]);
        }
        return back()->withErrors([
            'createError' => 'Data gagal ditambahkan',
        ]);
    }

    // public function createKategori(){
    //     $data['title'] = 'Create Kategori';

    //     return view('application/create/kategori', ['data' => $data]);
    // }

    // public function createKategori_action(Request $request)
    // {
    //     $request->validate([
    //         'kategori' => 'required',
    //     ],[
    //         'kategori.required' => 'Kolom kategori harus diisi!',
    //     ]);
        
    //     $kategori = new Kategori([
    //         'kategori' => $request->kategori,
    //     ]);

    //     if($kategori->save()){
    //         return redirect()->route('kategori')->with('createSuccess', 'Data berhasil ditambahkan');
    //     }

    //     return back()->withErrors([
    //         'createError' => 'Data gagal ditambahkan',
    //     ]);
    // }

    // public function editKategori($idKategori){
    //     $data['title'] = 'Edit Kategori';

    //     $kategoriFound = Kategori::where('id_kategori', $idKategori)->first();

    //     return view('application/edit/kategori', ['data' => $data, 'kategori' => $kategoriFound]);
    // }

    // public function editKategori_action(Request $request)
    // {
    //     $request->validate([
    //         'kategori' => 'required',
    //     ],[
    //         'kategori.required' => 'Kolom kategori harus diisi!',
    //     ]);

    //     if(Kategori::where('id_kategori', $request->id_kategori)){
    //         if(Kategori::where('id_kategori', $request->id_kategori)->update([
    //             'KATEGORI'=>$request->kategori
    //             ])
    //         ){
    //             return redirect()->route('kategori')->with('createSuccess', 'Perubahan berhasil disimpan');
    //         }
    //         return back()->withErrors([
    //             'createError' => 'Perubahan gagal',
    //         ]);
    //     }
    //     return back()->withErrors([
    //         'createError' => 'Perubahan gagal',
    //     ]);
    // }

    // public function deleteKategori_action(Request $request)
    // {

    //     if(Kategori::where('id_kategori', $request->id_kategori)){
    //         if(Kategori::where('id_kategori', $request->id_kategori)->delete()){
    //             return redirect()->route('kategori')->with('createSuccess', 'Data berhasil dihapus');
    //         }
    //         return back()->withErrors([
    //             'createError' => 'Data gagal dihapus',
    //         ]);
    //     }
    //     return back()->withErrors([
    //         'createError' => 'Data gagal dihapus',
    //     ]);
    // }


    // // get data
    // public function getKategori(){
    //     $kategoris = Kategori::all();
    //     $arrNamaKategori = array();
    //     $i = 0;
    //     if($kategoris){
    //         foreach($kategoris as $item){
    //             $arrNamaKategori [$i]['ID_KATEGORI'] = $item->ID_KATEGORI;
    //             $arrNamaKategori [$i]['KATEGORI'] = $item->KATEGORI;
    //             $i++;
    //         }
    //     }
    //     return json_encode($arrNamaKategori);
    // }
}

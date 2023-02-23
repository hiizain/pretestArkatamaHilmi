<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel as Kategori;
use App\Models\BlogModel as Blog;
use App\Models\KontenModel as Konten;

class PageController extends Controller
{
    public function index(){
        $data['title'] = 'Kategori';
 
        $blog = Blog::where('status_publish', '1')->get();
        return view('application/landPage', ['data' => $data, 'blog' => $blog]);
    }

    public function artikel($slug){
        $data['title'] = 'Kategori';
        $blog = Blog::where('slug', $slug)->first();
        $konten = '';
        if(Blog::where('slug', $slug)->where('status_publish', '1')->first()){
            $konten = Konten::where('id_konten', $blog->ID_KONTEN)->first();
            return view('application/artikel', ['data' => $data, 'konten' => $konten, 'blog' => $blog]);
        }
        return back()->withErrors([
            'createError' => 'Data gagal ditambahkan',
        ]);
        // var_dump($blog->ID_KONTEN);
        // die();
    }

    public function createKategori(){
        $data['title'] = 'Create Kategori';

        return view('application/create/kategori', ['data' => $data]);
    }

    public function createKategori_action(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
        ],[
            'kategori.required' => 'Kolom kategori harus diisi!',
        ]);
        
        $kategori = new Kategori([
            'kategori' => $request->kategori,
        ]);

        if($kategori->save()){
            return redirect()->route('kategori')->with('createSuccess', 'Data berhasil ditambahkan');
        }

        return back()->withErrors([
            'createError' => 'Data gagal ditambahkan',
        ]);
    }

    public function editKategori($idKategori){
        $data['title'] = 'Edit Kategori';

        $kategoriFound = Kategori::where('id_kategori', $idKategori)->first();

        return view('application/edit/kategori', ['data' => $data, 'kategori' => $kategoriFound]);
    }

    public function editKategori_action(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
        ],[
            'kategori.required' => 'Kolom kategori harus diisi!',
        ]);

        if(Kategori::where('id_kategori', $request->id_kategori)){
            if(Kategori::where('id_kategori', $request->id_kategori)->update([
                'KATEGORI'=>$request->kategori
                ])
            ){
                return redirect()->route('kategori')->with('createSuccess', 'Perubahan berhasil disimpan');
            }
            return back()->withErrors([
                'createError' => 'Perubahan gagal',
            ]);
        }
        return back()->withErrors([
            'createError' => 'Perubahan gagal',
        ]);
    }

    public function deleteKategori_action(Request $request)
    {

        if(Kategori::where('id_kategori', $request->id_kategori)){
            if(Kategori::where('id_kategori', $request->id_kategori)->delete()){
                return redirect()->route('kategori')->with('createSuccess', 'Data berhasil dihapus');
            }
            return back()->withErrors([
                'createError' => 'Data gagal dihapus',
            ]);
        }
        return back()->withErrors([
            'createError' => 'Data gagal dihapus',
        ]);
    }






    // get data
    public function getKategori(){
        $kategoris = Kategori::all();
        $arrNamaKategori = array();
        $i = 0;
        if($kategoris){
            foreach($kategoris as $item){
                $arrNamaKategori [$i]['ID_KATEGORI'] = $item->ID_KATEGORI;
                $arrNamaKategori [$i]['KATEGORI'] = $item->KATEGORI;
                $i++;
            }
        }
        return json_encode($arrNamaKategori);
    }
}

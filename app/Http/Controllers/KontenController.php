<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\BlogModel as Blog;
use App\Models\KontenModel as Konten;
use Illuminate\Support\Facades\Auth;

class KontenController extends Controller
{
    // public function index(){
    //     $data['title'] = 'Konten';

    //     // var_dump(Auth::user());
    //     // die();
    //     // $idUser = Auth::user()->email;
    //     $idUser = UserModel::where('email','hilmi@gmail.com')->first();
    //     // $idUser = UserModel::where('email',Auth::user()->email)->first();
    //     // var_dump($idUser);
    //     // die();

    //     $blogs = Blog::where('id_user',$idUser->ID_USER)->get();
    //     return view('application/welcome', ['data' => $data, 'blogs' => $blogs]);
    // }

    // public function createKonten(){
    //     $data['title'] = 'Create Konten';

    //     return view('application/edit/konten', ['data' => $data]);
    // }

    public function createKonten_action(Request $request)
    {
        $blog = Blog::where('id_blog', $request->idBlog)->first();

        if($blog->ID_KONTEN === null){
            $idKonten = $blog->SLUG.rand(100,500);
    
            $konten = new Konten([
                'id_konten' => $idKonten,
                'isi' => $request->isiKonten
            ]);
    
            if( $konten->save() 
                && 
                Blog::where('id_blog', $request->idBlog)->update([
                    'ID_KONTEN'=>$idKonten
                ])
            ){
                return redirect("editBlog/$request->idBlog")->with('createSuccess', 'Perubahan berhasil disimpan');
            }
            return back()->withErrors([
                'createError' => 'Perubahan gagal',
            ]);
        } else {
            if( Konten::where('id_konten', $blog->ID_KONTEN)->update([
                    'ISI'=>$request->isiKonten
                ])
            ){
                return redirect("editBlog/$request->idBlog")->with('createSuccess', 'Perubahan berhasil disimpan');
            }
            return back()->withErrors([
                'createError' => 'Perubahan gagal',
            ]);
        }
        return back()->withErrors([
            'createError' => 'Perubahan gagal',
        ]);


        
    }

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

    public function uploadImgKonten(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
}

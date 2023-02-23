<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\BlogModel as Blog;
use App\Models\UserModel;
use App\Models\KontenModel as Konten;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(){
        $data['title'] = 'Kategori';

        // var_dump(Auth::user()->email);
        // die();
        // $idUser = Auth::user()->email;
        // var_dump(Auth::user());
        // die();
        // $idUser = UserModel::where('email','hilmi@gmail.com')->first();
        $user = UserModel::where('email',Auth::user()->email)->first();
        // var_dump($idUser);
        // die();

        $blogs = Blog::where('id_user',$user->ID_USER)->get();
        return view('application/dashboard', ['data' => $data, 'blogs' => $blogs, 'user' => $user]);
    }

    // public function createKategori(){
    //     $data['title'] = 'Create Kategori';

    //     return view('application/create/kategori', ['data' => $data]);
    // }
    
    public function createBlog_action(Request $request)
    {
        // $request->validate([
        //     'judul' => 'required',
        // ],[
        //     'judul.required' => 'Kolom judul harus diisi!',
        // ]);
        // var_dump($request->judul);
        // die();

        // var_dump($request->kategori);
        // die();
        
        $blog = new Blog([
            'judul' => $request->judul,
            'id_user' => $request->idUser,
            'id_kategori' => '2',
            'status_publish' => '0',
            'slug' => Str::slug($request->judul),
        ]);

        if($blog->save()){
            return redirect()->route('blog')->with('createSuccess', 'Data berhasil ditambahkan');
        }

        return back()->withErrors([
            'createError' => 'Data gagal ditambahkan',
        ]);
    }

    public function editBlog($idBlog){
        $base_url = '/artikel';
        $data['title'] = 'Edit Blog';

        $blogFound = Blog::where('id_blog', $idBlog)->first();

        $konten = '';
        if($blogFound->ID_KONTEN !== null){
            $konten = Konten::where('id_konten', $blogFound->ID_KONTEN)->first();
        }

        return view('application/edit/blog', ['data' => $data, 'base_url' => $base_url, 'blog' => $blogFound, 'konten' => $konten]);
    }

    public function publishBlog($idBlog){

        // $blogFound = Blog::where('id_blog', $idBlog)->first();

        // $konten = '';
        // if($blogFound->id_konten !== null){
        //     $konten = Konten::where('id_konten', $blogFound->id_konten)->first();
        // }

        if(Blog::where('id_blog', $idBlog)){
            if(Blog::where('id_blog', $idBlog)->update([
                'STATUS_PUBLISH'=>'1',
                'TGL_UPLOAD'=>date("Y-m-d H:i:s")
                ])
            ){
                return redirect("editBlog/$idBlog")->with('createSuccess', 'Perubahan berhasil disimpan');
            }
            return back()->withErrors([
                'createError' => 'Perubahan gagal',
            ]);
        }
        return back()->withErrors([
            'createError' => 'Perubahan gagal',
        ]);

        // return view('application/edit/blog', ['data' => $data, 'base_url' => $base_url, 'blog' => $blogFound, 'konten' => $konten]);
    }

    public function takeDownBlog($idBlog){

        // $blogFound = Blog::where('id_blog', $idBlog)->first();

        // $konten = '';
        // if($blogFound->id_konten !== null){
        //     $konten = Konten::where('id_konten', $blogFound->id_konten)->first();
        // }

        if(Blog::where('id_blog', $idBlog)){
            if(Blog::where('id_blog', $idBlog)->update([
                'STATUS_PUBLISH'=>'0',
                'TGL_UPLOAD'=>date("Y-m-d H:i:s")
                ])
            ){
                return redirect("editBlog/$idBlog")->with('createSuccess', 'Perubahan berhasil disimpan');
            }
            return back()->withErrors([
                'createError' => 'Perubahan gagal',
            ]);
        }
        return back()->withErrors([
            'createError' => 'Perubahan gagal',
        ]);

        // return view('application/edit/blog', ['data' => $data, 'base_url' => $base_url, 'blog' => $blogFound, 'konten' => $konten]);
    }

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
}

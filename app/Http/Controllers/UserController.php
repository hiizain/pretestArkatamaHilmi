<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required|unique:user',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        // var_dump($request->nama_depan);
        // die();
        
        $users = new User([
            'nama' => $request->nama_depan.' '.$request->nama_belakang,
            'username' => $request->email,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user = new UserModel([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'username' => $request->email,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $users->save();
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }

    public function login()
    {
        $data['title'] = 'Login';
        return view('login', $data);
    }

    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
 
    //     if (Auth::attempt($credentials)) {
    //         // Authentication passed...
    //         return redirect()->intended('dashboard');
    //     }
    // }

    public function authenticate(Request $request)
    {
        // var_dump($request->email);
        // die();

        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/blog');
        // } else
        // return back()->with('loginError', 'Login gagal');

        // var_dump($request->email);
        // die();

        // $credentials = $request->only('email', 'password');
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('blog');
        }

        // $credentials = $request->validate([
        //     'email' => ['required'],
        //     'password' => ['required'],
        // ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('blog');
        // };
        // else {
        //     var_dump($request->email);
        //     die();  
        // }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

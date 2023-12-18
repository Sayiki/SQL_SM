<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Login;

class loginController extends Controller
{
    public function login()
    {
        return view('sesi/login');
    }
    public function logins(Request $request)
    {
        Session::flash('email', $request->email);
       $request->validate([
            'email'=>'required',
            'password'=>'required'
       ],[
            'emai.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi'
       ]);

       $infologin = [
            'email'=> $request->email,
            'password'=> $request->password,
       ];

       if(Auth::attempt($infologin)){
            return redirect('dashboard')->with('success','Berhasil Login');
       }else{
            // return 'gagal';
            return redirect('sesi')->withErrors('emial dan password yang dimasukkan tidak valid');
       }
    }

    function logout(){
          Auth::logout();
          return redirect('sesi')->with('success','Berhasil logout');
    }
}

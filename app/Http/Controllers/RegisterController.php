<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class RegisterController extends Controller
{
    public function register(){
        return view('register/register');
    }

    public function create(Request $request){
        Session::flash('fname', $request->fname);
        Session::flash('lname', $request->lname);
        Session::flash('username', $request->username);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
       $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required|min:6'
            
       ], [
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi',
            'password.min'=>'Minimun password yang di inputkan adalah 6'
       ]);

       $data = [
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
       ];
       User::create($data);

       return redirect('/sesi')->with('success', 'Registration success. Please login!');
    }

    }



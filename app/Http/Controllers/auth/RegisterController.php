<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index() {
        
        return view('auth.registrar');
    }


    public function store(Request $request) {

        // dd($request);
        // dd($request->get('username'));

        //validacion

        $request->request->add(['username'=>Str::slug($request->username)]);
        
        $this->validate($request,[
            "name"=> 'required',
            "username"=> 'required|unique:users|min:3|max:20',
            "email"=> 'required|unique:users| email',
            "password"=> 'required|min:6',
            "password_confirmation"=> 'required|same:password',
        ]);


        User::create([
            "name"=> $request->name,
            "username"=> $request->username,
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
            "imagen" => "hola"
        ]);

        // autenticar
        // Auth()->attempt([
        //     'email'=>$request->email,
        //     'password'=>$request->password
        // ]);

        auth()->attempt($request->only('email','password'));

        return redirect()->route('posts.index', auth()->user()->username);
    }
}

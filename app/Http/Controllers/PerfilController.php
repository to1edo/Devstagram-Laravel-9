<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request ,User $user){

        return view('perfil.index',[
            'user'=>$request->user()
        ]);
    }


    public function store(Request $request){


        $request->request->add(['username'=>Str::slug($request->username)]);

        $this->validate($request,[
            'username' => 'required|unique:users,username,'.auth()->user()->id.'|min:3|max:20',
            "email"=> 'unique:users,email,'.auth()->user()->id.'| email'
        ]);


        if($request->imagen){

            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid().'.'.$imagen->extension();
    
            //intervention image instance
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);
    
            //upload path
            $imagenPath = public_path('perfiles').'/'. $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        $usuario = User::find(auth()->user()->id);

        //cambiar password
        // $request->username = auth()->user()->username;
        // dd($request->only('username','password'));
        if($request->password){
            
            if(!auth()->attempt(['username'=>auth()->user()->username, 'password' => $request->password ]) ){
                return back()->with('mensaje','Password incorrecto');
            }
            
            $this->validate($request,[
                'passwordNew' => 'required|min:6'
            ]);

            $usuario->password = Hash::make($request->passwordNew);
        }

        //guardar cambios
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->imagen = $nombreImagen ?? $usuario->imagen ?? '';

        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);
    }
}

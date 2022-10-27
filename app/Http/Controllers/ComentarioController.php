<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //contoller no utilizado, se implemento livewire para agragar comentarios
    public function store(Request $request, User $user, Post $post){

        $this->validate($request,[
            "comentario" => "required|max:255"
        ]);

        Comentario::create([
            "comentario" => $request->comentario,
            "user_id" => auth()->user()->id,
            "post_id" => $post->id
        ]);

        return back()->with('mensaje','Comentario agregado');
    }
}

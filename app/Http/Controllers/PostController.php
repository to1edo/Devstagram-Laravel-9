<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    public function index(User $user){

        //get posts of user
        $posts = Post::where('user_id',$user->id)->paginate(8);

        // dd($user->posts);


        return view('dashboard', [
            "user" => $user,
            "posts" => $posts
        ]);
    }

    public function create(Request $request){
        
        return view('posts.create');
    }

    public function store(Request $request){
        

        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);


        // Post::create([
        //     "titulo"=> $request->titulo,
        //     "descripcion"=> $request->descripcion,
        //     "imagen"=> $request->imagen,
        //     "user_id"=> auth()->user()->id 
        // ]);

        //otra manera de guardar
        // $post = new Post;
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id =auth()->user()->id;
        // $post->save();

        //usando relaciones
        $request->user()->posts()->create([
            "titulo"=> $request->titulo,
            "descripcion"=> $request->descripcion,
            "imagen"=> $request->imagen,
            "user_id"=> auth()->user()->id 
        ]);

        return redirect()->route('posts.index',auth()->user()->username);
    }


    public function show(User $user, Post $post){

        return view('posts.show',[
            'post' => $post,
            'user' => $user
        ]);
    }


    public function destroy(Post $post){

        $this->authorize('delete',$post);

        $post->delete();

        $image_path = public_path('uploads/'.$post->imagen);

        if(File::exists($image_path))
        {
            unlink($image_path);
        }
        
        return redirect()->route('posts.index',auth()->user()->username);
    }


}

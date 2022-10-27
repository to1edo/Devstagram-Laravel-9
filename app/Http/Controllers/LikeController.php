<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class LikeController extends Controller
{
    // codigo previo a la implementacion de livewire para la funcinalidad de likes
    // no sera usado
    
    public function store(Request $request,Post $post)
    {   

        if(!auth()->user()){
            return redirect()->route('login');
        }

        if(!$post->checkLikes($request->user())){

            $post->likes()->create([
                'user_id' => $request->user()->id
            ]);

        }else{
            
            $request->user()->likes()->where('post_id',$post->id)->delete();
        }

        return back();
    }

}

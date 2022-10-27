<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;


    public function mount($post){ // mount se manda a llamar automaticamnte al instanciar el compenente de livewire en el template padre
        $this->isLiked = $post->checkLikes( auth()->user());
        $this->likes = $post->likes->count();
    }

    public function like(){


        if(!auth()->user()){
            return redirect()->route('login');
        }
        if(!$this->post->checkLikes( auth()->user())){

            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);

            $this->isLiked = true;
            $this->likes ++;

        }else{
            $this->post->likes()->where('post_id',$this->post->id)->delete();
            $this->isLiked = false;
            $this->likes--;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}

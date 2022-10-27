<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class MostrarComentarios extends Component
{
    public $post;

    public function boot(Post $post){
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.mostrar-comentarios');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Comentario;
use App\Models\User;

class Comentarios extends Component
{
    public $post;
    public $comentario;
    public $comentarios;
    public $autores= [];

    protected $listeners = ['eliminarComentario'];

    protected $rules = [
        "comentario" => "required|string|max:255"
    ];

    public function mount(Post $post){
        $this->post = $post;
        $this->comentarios = $post->comentarios;
    }
    
    public function agregarComentario(){
        $this->validate();

        Comentario::create([
            "comentario" => $this->comentario,
            "user_id" => auth()->user()->id,
            "post_id" => $this->post->id
        ]);

        $this->comentario = '';
        $this->comentarios = Comentario::all()->where('post_id',$this->post->id );


        //retornar mensaje
        session()->flash('mensaje','Comentario agregado');

        //redireccionar
        return redirect()->back();
    }


    public function eliminarComentario($id){
        
        Comentario::find($id)->delete();
        $this->comentarios = Comentario::all()->where('post_id',$this->post->id );

    }

    public function render()
    {
        $i=0;
        foreach($this->comentarios as $comentario){
            $this->autores[$comentario->user_id] = User::find($comentario->user_id)->username;
            $i++;
        } 

        return view('livewire.comentarios',[
            "comentarios"=> $this->comentarios,
            "autores" => $this->autores
        ]);
    }
}

@extends('layouts.app')


@section('titulo')
    {{$post->titulo}}
@endsection


@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{asset('uploads').'/'.$post->imagen}}" alt="{{'imagen '.$post->titulo}}">

            <div class="p-3 flex gap-5 items-start">
                <div class="flex gap-2 items-start">

                    {{-- codigo previo a la implementacion de livewire para la funcinalidad de likes --}}
                    {{-- @auth
                        <form action="{{ route('likes.store',$post)}}" method="POST">
                            @csrf
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill=" {{ $post->checklikes(auth()->user()) ? 'red' : 'white' }}" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                            </button>
                        </form>
                    @endauth
                    <p class="font-semibold">{{ $post->likes->count()}} likes</p> --}}
                    <livewire:like-post :post="$post">
                </div>

                <div class="flex gap-2 items-start" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                    <p class="font-semibold">{{ $post->comentarios->count()}} comments</p>

                </div>
            </div> 
            

            <div class="flex items-center gap-2">
                <a href="{{route('posts.index',$post->user->username)}}">
                    <p class="font-bold">{{$post->user->username}}</p>
                </a>
                <p>{{$post->titulo}}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    
                    <form action="{{route('posts.destroy',['post'=>$post])}}" method="POST" >
                        @method('DELETE')
                        @csrf
                        <input  type="submit" class=" py-1 px-2 rounded-md cursor-pointer block mx-auto bg-red-600 hover:bg-red-700 text-white font-bold " value="Eliminar publicacion">
                    </form>
                
                @endif
            @endauth
        </div>
        
        
        <livewire:comentarios :post="$post" />

       
        
    </div>
@endsection
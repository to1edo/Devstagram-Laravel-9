@extends('layouts.app')


@section('titulo')
    Perfil
@endsection


@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-6/12 lg:w-8/12 flex flex-col md:flex-row items-center justify-center">

            <div class="w-1/2 md:w-6/12 lg:w-4/12 px-5 ">
                <img class="rounded-full" src="{{ $user->imagen ? asset("/perfiles/$user->imagen") : asset("img/usuario.svg") }}"  alt="foto usuario">
            </div>

            <div class="w-1/2 md:w-6/12 lg:w-4/12 px-5 mt-4 md:mt-0 flex flex-col items-center md:items-start">
                <div class="flex gap-2 items-center mb-4">
                    <p class="text-gray-700 text-2xl ">@ {{ $user->username}}</p>

                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{route('perfil.index', $user)}}" class="cursor-pointer text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>
                        @endif
                    @endauth

                </div>
                
                <p class="text-gray-700 font-semibold mb-2">{{ $user->followers->count() }} <span class="font-normal ml-1">Seguidores</span></p>
                <p class="text-gray-700 font-semibold mb-2">{{ $user->followings->count() }} <span class="font-normal ml-1">Siguiendo</span></p>
                <p class="text-gray-700 font-semibold ">{{$user->posts->count()}}<span class="font-normal ml-1"> Publicaciones</span></p>

                @auth
                    @if ($user->id !== auth()->user()->id)

                        @if (!$user->following(auth()->user() ))
                            <form action="{{route('users.follow',$user)}}" method="POST">
                                @csrf
                    
                                <input type="submit" class="py-1 px-2 rounded-md cursor-pointer mx-auto bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm mt-6" value="Seguir">
                            </form>
                        @else
                            <form action="{{route('users.unfollow',$user)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="py-1 px-2 rounded-md cursor-pointer mx-auto bg-red-600 hover:bg-red-700 text-white font-bold text-sm mt-6" value="Dejar de seguir">
                            </form> 
                        @endif

                    @endif
                @endauth
            </div>

        </div>
    </div>

    <section class="mt-8">
        <h2 class="mb-6 text-center text-3xl font-black">Publicacioness</h2>
        {{-- {{dd(count($posts));}} --}}

        @if (count($posts))
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div class="">
                        <a href="{{ route('posts.show',['post'=>$post, 'user'=>$user])}}">
                            <img src="{{asset('uploads').'/'.$post->imagen}}" alt="{{'imagen '. $post->titulo}}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">

                {{$posts->links()}}
            </div>
        @else
            <p class="text-center text-gray-600 font-bold">No hay publicaciones</p>
        @endif
        
    </section>

@endsection
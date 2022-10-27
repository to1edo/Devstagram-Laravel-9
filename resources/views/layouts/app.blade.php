<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <title>@yield('titulo')</title>
        @livewireStyles
    </head>
    <body class="bg-gray-100">
        <header class="bg-white flex justify-between items-center py-4 px-8">
            <div>
                {{-- @auth
                    <a href="{{route('posts.index', auth()->user()->username)}}">
                        <p class="text-3xl text-blue-600 font-black">DevStagram</p>
                    </a> 
                @endauth --}}

                {{-- @guest --}}
                    <a href="/">
                        <p class="text-3xl text-blue-600 font-black">DevStagram</p>
                    </a>
                {{-- @endguest --}}
                
            </div>

            <nav class="uppercase flex gap-4 items-center font-semibold text-sm">
                @auth
                <a href="{{route('posts.create')}}" class="flex gap-1 items-center mr-4 hover:bg-gray-100 rounded p-1 px-2 capitalize text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                    </svg>
                    
                    Crear
                </a>

                <a class="flex gap-2 items-center" href="{{route('posts.index', auth()->user()->username)}}">
                    <img class="rounded-full h-8" src="{{ auth()->user()->imagen ? asset("/perfiles").'/'.auth()->user()->imagen : asset("img/usuario.svg") }}"  alt="foto usuario">
                    <p class="capitalize text-blue-600 font-bold text-lg "> {{auth()->user()->name}}</p>
                </a>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="hover:text-blue-600 text-xl ml-6">Cerrar sesion</button>
                </form>
                @endauth

                @guest
                    <a class="hover:text-blue-600" href="{{route('login')}}">Login</a>
                    <a class="hover:text-blue-600" href="{{route('register')}}">Crear Cuenta</a>
                @endguest
            </nav>
        </header>

        <main class="p-6 px-8">
            <h1 class="text-center font-extrabold text-2xl py-6">@yield('titulo')</h1>
            
            @yield('contenido')
        </main>

        <footer>
            <p class="text-center p-1 text-gray-500 font-bold">DevStagram, By to1edo</p>
        </footer>
    
        @livewireScripts
        @stack( 'scripts' )
    </body>
</html>

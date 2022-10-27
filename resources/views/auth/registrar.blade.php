@extends('layouts.app')


@section('titulo')
    Registrate en DevStagram
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">

        <div class="md:w-5/12 shadow-xl">
            <img src="{{asset("img/Diseño/registrar.jpg") }}" class=" object-cover h-full bg-cover w-full "  alt="foto registrar">
        </div>

        <form action="{{route('register')}}" method="POST" class="md:w-5/12  bg-white p-6  shadow-xl">
            @csrf
            <div class="mb-4">
                <label for="name" class=" text-gray-500 font-bold ">Nombre</label>
                <input type="text" id="name" name="name" class="rounded-lg p-2 border block w-full mt-2 @error('name') border-red-500 @enderror" placeholder="Tu nombre" value="{{ old('name')}}">
                @error("name")
                    <p class="pl-1 text-red-400 font-semibold text-sm">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="username" class=" text-gray-500 font-bold ">Usuario</label>
                <input type="text" id="username" name="username" class=" rounded-lg p-2 border block w-full mt-2 @error('username') border-red-500 @enderror" placeholder="Tu nombre de usuario" value="{{ old('username')}}">
                @error("username")
                    <p class="pl-1 text-red-400 font-semibold text-sm">{{$message}}</p>
                @enderror
            </div class="mb-4">

            <div class="mb-4">
                <label for="email" class=" text-gray-500 font-bold ">Email</label>
                <input type="email" id="email" name="email" class=" rounded-lg p-2 border block w-full mt-2 @error('email') border-red-500 @enderror" placeholder="Tu email" value="{{ old('email')}}">
                @error("email")
                    <p class="pl-1 text-red-400 font-semibold text-sm">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class=" text-gray-500 font-bold ">Password</label>
                <input type="password" id="password" name="password" class=" rounded-lg p-2 border block w-full mt-2 @error('password') border-red-500 @enderror" placeholder="Tu password">
                @error("password")
                    <p class="pl-1 text-red-400 font-semibold text-sm">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class=" text-gray-500 font-bold ">Confirmar Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class=" rounded-lg p-2 border block w-full mt-2 @error('password_confirmation') border-red-500 @enderror" placeholder="Repetir password">
                @error("password_confirmation")
                    <p class="pl-1 text-red-400 font-semibold text-sm">{{$message}}</p>
                @enderror
            </div>

            <input type="submit" class="p-3 rounded-xl block w-full cursor-pointer md:w-1/2 md:mx-auto bg-blue-600 hover:bg-blue-700 text-white font-bold" value="Crear Cuenta">
        </form>
    </div>
@endsection
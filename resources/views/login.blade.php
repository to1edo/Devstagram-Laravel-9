@extends('layouts.app')


@section('titulo')
    Iniciar sesion
@endsection


@section('contenido')
<div class="md:flex md:justify-center">

    <div class="md:w-5/12 shadow-xl">
        <img src="{{asset("img/Diseño/login.jpg") }}" class=" object-cover h-full bg-cover w-full "  alt="foto registrar">
    </div>

    <form action="{{route('login')}}" method="POST" class="md:w-5/12  bg-white p-6  shadow-xl">
        @csrf

        @if (session('mensaje'))
        <p class="pl-1 text-red-700 rounded-lg text-center font-semibold text-lg bg-red-200">{{session('mensaje')}}</p>
        @endif
        
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

        <input class="mb-6" type="checkbox" name="remember" id="remember"> <label class=" text-gray-500" for="remember">Mantener sesion activa</label>

        <input type="submit" class="p-3 rounded-xl block w-full cursor-pointer md:w-1/2 md:mx-auto bg-blue-600 hover:bg-blue-700 text-white font-bold" value="iniciar sesion">
    </form>
</div>
@endsection
@extends('layouts.app')


@section('titulo')
  Editar perfil: {{ $user->username}}
@endsection

@section('contenido')
<div class="md:w-1/2 mx-auto shadow-xl bg-white p-4">
  <form action="{{route('perfil.store',auth()->user())}}" method="POST" enctype="multipart/form-data">
      @csrf

      <fieldset class="mb-4 border-2 border-gray-300 p-2">
        <legend class="font-bold text-gray-500">Cambiar tus Datos</legend>

        <div class="mb-4">
          <label for="username" class=" text-gray-500 font-semibold ">Usuario</label>
          <input type="text" id="username" name="username" class=" rounded-lg p-2 border block w-full mt-2 @error('username') border-red-500 @enderror" placeholder="Tu nombre de usuario" value="{{ $user->username}}">
          @error("username")
            <p class="pl-1 text-red-400 font-semibold text-sm">{{$message}}</p>
          @enderror
        </div class="mb-4">
  
        <div class="mb-4">
          <label for="email" class=" text-gray-500 font-bold ">Email</label>
          <input type="email" id="email" name="email" class=" rounded-lg p-2 border block w-full mt-2 @error('email') border-red-500 @enderror" placeholder="Tu email" value="{{ $user->email}}">
          @error("email")
            <p class="pl-1 text-red-400 font-semibold text-sm">{{$message}}</p>
          @enderror
        </div>
        
        <div class="mb-4">
          <label for="imagen" class=" text-gray-500 font-semibold">Foto de perfil</label>
          <input type="file" accept=".jpg, .png, .jpeg, .webp, .svg" id="imagen" name="imagen" class=" rounded-lg p-2 border block w-full mt-2">
        </div class="mb-4">

      </fieldset>

      <fieldset class="mb-4 border-2 border-gray-300 p-2">
        <legend class="font-bold text-gray-500">Cambiar password</legend>

        @if (session('mensaje'))
        <p class="pl-1 text-red-700 rounded-lg text-center font-semibold text-lg bg-red-200">{{session('mensaje')}}</p>
        @endif

        <div>
          <label for="password" class=" text-gray-500 font-semibold ">Password Actual</label>
          <input type="password" id="password" name="password" class=" rounded-lg p-2 border block w-full mt-2 @error('password') border-red-500 @enderror" placeholder="Tu password">
          @error("password")
          <p class="pl-1 text-red-400 font-semibold text-sm">{{$message}}</p>
          @enderror
        </div>

        <div>
          <label for="passwordNew" class=" text-gray-500 font-semibold ">Password Nueva</label>
          <input type="password" id="passwordNew" name="passwordNew" class=" rounded-lg p-2 border block w-full mt-2 @error('passwordNew') border-red-500 @enderror" placeholder="Tu password nueva">
          @error("passwordNew")
          <p class="pl-1 text-red-400 font-semibold text-sm">{{$message}}</p>
          @enderror
        </div>

      </fieldset>

      <input type="submit" class="mt-8 p-3 rounded-xl block w-full cursor-pointer md:w-1/2 md:mx-auto bg-blue-600 hover:bg-blue-700 text-white font-bold" value="Guardar cambios">

  </form>
</div>
    
@endsection
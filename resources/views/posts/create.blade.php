@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('titulo')
    Crear Publicacion
@endsection

@section('contenido')
    <div class="flex flex-col md:flex-row md:justify-center md:items-center gap-4">

        <div id="my-form" class="md:w-5/12 shadow-xl ">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-full rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
    
        <form action="{{route('posts.store')}}" method="POST" class=" md:w-5/12  bg-white p-6  shadow-xl">
            @csrf
    
            @if (session('mensaje'))
            <p class="pl-1 text-red-700 rounded-lg text-center font-semibold text-lg bg-red-200">{{session('mensaje')}}</p>
            @endif

            <div class="mb-4 ">
                <label for="titulo" class=" text-gray-500 font-bold ">Titulo</label>
                <input type="text" id="titulo" name="titulo" class=" rounded-lg p-2 border block w-full mt-2 @error('titulo') border-red-500 @enderror" placeholder="Titulo de la publicacion" value="{{ old('descripcions')}}">
                @error("titulo")
                    <p class="pl-1 text-red-400 font-semibold text-sm">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="descripcion" class=" text-gray-500 font-bold ">Descripcion</label>
                <textarea name="descripcion" id="descripcion" class=" rounded-lg p-2 border block w-full mt-2 @error('descripcion') border-red-500 @enderror" placeholder="Agrega una descripcion" cols="30" rows="10">{{ old('descripcions')}}</textarea>
                @error("descripcion")
                    <p class="pl-1 text-red-400 font-semibold text-sm">{{$message}}</p>
                @enderror
            </div>

            <div>
                <input type="hidden" name="imagen" value="{{ old('imagen')}}">
                @error("imagen")
                    <p class="pl-1 text-red-400 font-semibold text-sm">{{$message}}</p>
                @enderror
            </div>

            <input type="submit" class=" p-3 rounded-xl block w-full cursor-pointer md:w-1/2 md:mx-auto bg-blue-600 hover:bg-blue-700 text-white font-bold " value="Publicar">
        </form>
    </div>
@endsection
@extends('layouts.app')

@section('titulo')
    Inicio
@endsection


@section('contenido')
    <x-listar-post :posts="$posts"/>
@endsection
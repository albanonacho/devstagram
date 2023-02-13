@extends('layouts.app')

@section('titulo')
Página principal
@endsection

@section('contenido')
<div class="container">
    <x-listar-post :posts="$posts"/>
</div>
@endsection
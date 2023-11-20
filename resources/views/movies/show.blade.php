@extends('layouts/app')

@section('content') 
    <h1 class="mb-4 text-4xl font-extrabold">À propos du film "{{ $title }}"</h1>
    <p><strong>Durée :</strong> {{ $duration }}</p>
    <p><strong>Synopsis :</strong> {{ $synopsis }}</p>
    <a href="/films" class="text-gray-500">Retour aux films</a>

@endsection

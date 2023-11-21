@extends('layouts/app')

@section('content') 
<div class="flex">
    <div class="w-2/5">
        <img class="w-full" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
    </div>
    <div class="w-3/5">
        <div class="border p-4 shadow-lg">
            <h1 class="text-4xl font-bold">{{ $movie->title }}</h1>
            <p><strong>Durée :</strong> {{ $movie->duration }}</p>
            <p><strong>Synopsis :</strong> {{ $movie->synopsis }}</p>
        </div>
    </div>
</div>


    <a href="/films" class="text-gray-500">Retour aux films</a>

@endsection

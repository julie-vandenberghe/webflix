@extends('layouts/app') 

@section('content') 

<h1 class="mb-4 text-4xl font-extrabold">Nos films</h1>
    <a href="/films/creer">Créer un film</a>

    @foreach ($films as $movie)
    <div>
        <h3>{{ $movie->title }}</h3>
        <p>{{ $movie->synopsis }}</p>
        <p>Durée: {{ $movie->duration }}</p>
        <img class="w-32" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
        @if ($movie->released_at)
        <p>Sortie: {{ $movie->released_at }}</p>
        @endif
        @if ($movie->category_id)
        <p>Catégorie: {{ $movie->category_id }}</p>
        @endif
        <a href="/film/{{ $movie->id }}">Voir</a>
    </div>
@endforeach
@endsection
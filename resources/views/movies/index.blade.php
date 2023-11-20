@extends('layouts/app') 

@section('content') 

<h1 class="mb-4 text-4xl font-extrabold">Nos films</h1>
    <a href="/films/creer">Créer un film</a>

    <div>
        @foreach ($films as $movie)
            <div>
                <h2><a href="/film/{{ $movie->id }}">{{ $movie->title }}</a></h2>
            </div>  
        @endforeach
    </div>
@endsection
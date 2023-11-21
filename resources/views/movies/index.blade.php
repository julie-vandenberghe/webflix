@extends('layouts/app') 

@section('content') 

<h1 class="mb-4 text-4xl font-extrabold">Nos films</h1>
<a href="/films/creer" class="px-4 py-2 text-sm bg-blue-500 hover:bg-blue-300 duration-200 text-white rounded-full shadow-sm">Créer un film</a>


<div class="flex flex-wrap my-3">
    @foreach ($films as $movie)
        <div class="w-1/2 sm:w-1/3 lg:w-1/5 mb:3">
            <div class="flex flex-col justify-between h-full">
                <a href="/film/{{$movie->id}}" class="block mx-3 group">
                    <img class="w-full h-[300px] object-cover" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
                    <h3 class="text-sm text-gray-600 underline group-hover:no-underline">{{ $movie->title }}</h3>
                    {{-- <p>{{ $movie->synopsis }}</p> --}}
                    <p>
                    @if ($movie->released_at)
                    {{ $movie->released_at->diffForHumans()}} | {{-- Permet d'avoir 3 weeks ago --}}
                    {{ $movie->released_at->translatedFormat('d F Y') }} | 
                    @endif
                    @if ($movie->category_id)
                    {{ $movie->category->name}} | {{-- Attention ! Ici, après category, on ne met pas de parenthèses car il s'agit d'une méthode magique --}}
                    @endif
                    {{ $movie->duration() }}</p>
                </a> 
                <div class="mx-3 mb-3 flex justify-between gap-2">
                    <a href="/film/{{$movie->id}}/modifier" class="text-sm bg-gray-500 px-2 py-1 text-gray-200 w-1/2 text-center">Modifier</a>
                    <a href="/film/{{$movie->id}}/supprimer" class="text-sm bg-red-500 px-2 py-1 text-gray-200 w-1/2 text-center" onclick="return confirm("Êtes-vous sûr de vouloir supprimer le film {{$movie->title}} ?\")">Supprimer</a>
                </div>
            </div>
        </div>    
    @endforeach
</div>



@endsection
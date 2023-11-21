@extends('layouts/app')

@section('content')
    <a href="/films" class="text-gray-500">Retour aux films</a>
    <div class="flex gap-10 items-center">
        <div class="w-2/5">
            <img class="w-full" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
        </div>
        <div class="w-3/5">
            <div class="border p-4 shadow-lg">
                <h1 class="text-3xl">{{ $movie->title }}</h1>
                <p class="my-3">{{ $movie->synopsis }}</p>
                <p class="text-sm">
                    @if ($movie->released_at)
                    {{ $movie->released_at->diffForHumans() }} |
                    {{ $movie->released_at->translatedFormat('d F Y') }} |
                    @endif
                    @if ($movie->category_id)
                    {{ $movie->category->name }} |
                    @endif
                    {{ $movie->duration() }}
                </p>
            </div>
            @if ($movie->youtube)
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $movie->youtube }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            @endif
        </div>
    </div>
@endsection

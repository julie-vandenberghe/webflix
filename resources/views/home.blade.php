@extends('layouts/app') {{-- dit que on étend le fichier app.blade.php situé dans dossier "layouts" --}}

@section('content') {{-- ici remettre le nom dans @yield dans le fichier app --}}
<h1 class="mb-4 text-4xl font-extrabold">Hello {{ $name }} !</h1>

<ul>
@foreach ($games as $game)
    <li>{{ $game }}</li>  
@endforeach
</ul>
@endsection
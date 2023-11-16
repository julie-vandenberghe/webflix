@extends('layouts/app') {{-- dit que on étend le fichier app.blade.php situé dans dossier "layouts" --}}

@section('content') {{-- ici remettre le nom dans @yield dans le fichier app --}}

    <h1 class="mb-4 text-4xl font-extrabold">Je me présente, je m'appelle Julie</h1>
    <p>Tu as {{ $age }} ans.</p>

    @if ($age >= 18)
        <p>Tu es majeur(e).</p>
    @else
        <p>Tu n'es pas majeur(e).</p>
    @endif

    @if ($friend) {{-- S'il y a un ami dans l'url --}}
    <p>Julie joue avec {{ $friend }}.</p>
    @endif

@endsection
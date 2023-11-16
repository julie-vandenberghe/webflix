@extends('layouts/app') {{-- dit que on étend le fichier app.blade.php situé dans dossier "layouts" --}}

@section('content') {{-- ici remettre le nom dans @yield dans le fichier app --}}
<h1>À propos de {{ $title }}</h1>

@dump($maVariable)

<ul>
@foreach ($team as $member)
    <li>{{ $member['prenom'] . ' ' . $peopleDev['nom'] . ' : ' . $peopleDev['fonction']}}</li>  
@endforeach
</ul>


@endsection
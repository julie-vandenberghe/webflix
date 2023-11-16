@extends('layouts/app') {{-- dit que on étend le fichier app.blade.php situé dans dossier "layouts" --}}

@section('content') {{-- ici remettre le nom dans @yield dans le fichier app --}}
<h1>À propos de {{ $title }}</h1>

<ul>
@foreach ($team as $member)
    <li>{{ $member['prenom'] . ' ' . $member['nom'] . ' : ' . $member['fonction']}}
    
    <img src="{{ $member['image'] }}" alt="">
    </li>  
@endforeach
</ul>


@endsection
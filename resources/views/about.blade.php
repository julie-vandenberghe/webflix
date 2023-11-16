@extends('layouts/app') {{-- dit que on étend le fichier app.blade.php situé dans dossier "layouts" --}}

@section('content') {{-- ici remettre le nom dans @yield dans le fichier app --}}
<h1>À propos de {{ $title }}</h1>

<table>
    <thead class="text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3">
                Tronche de cake
            </th>
            <th scope="col" class="px-6 py-3">
                T ki ? lol
            </th>
            <th scope="col" class="px-6 py-3">
                Job
            </th>
        </tr>
    </thead>
    <tbody>
@foreach ($team as $member)
    <tr class="bg-white border-b"><td class="px-6 py-4"><img src="{{ $member['image'] }}" alt="{{$member['nom']}}"></td><td class="px-6 py-4">{{ $member['prenom']}} {{$member['nom']}}</td><td class="px-6 py-4">{{$member['fonction']}}</td></tr>  
@endforeach
    </tbody></table>


@endsection
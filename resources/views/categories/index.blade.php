@extends('layouts/app') 

@section('content')
    <div class="flex items-center gap-10 mb-6">
        <h1 class="text-3xl">Nos catégories</h1>
        <a href="/categories/creer" class="px-4 py-2 text-sm bg-blue-500 hover:bg-blue-300 duration-200 text-white rounded-full shadow-sm">Créer une catégorie</a>
    </div>

    <div class="grid grid-cols-3 gap-6">
        @foreach ($categories as $category)
            <div class="border p-4 rounded shadow">
                <h2>{{ $category->name }}</h2>
            </div>
        @endforeach
    </div>
@endsection
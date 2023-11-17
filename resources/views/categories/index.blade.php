@extends('layouts/app') 

@section('content') 

    <h1>Nos catégories</h1>
    <a href="/categories/creer">Créer une catégorie</a>

    <div>
        @foreach ($categories as $category)
            <div>
                <h2>{{ $category->name }}</h2>
            </div>  
        @endforeach
    </div>
@endsection
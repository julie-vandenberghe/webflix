@extends('layouts/app') 

@section('content') 

    <div>
        @foreach ($categories as $category)
            <div>
                <h2>{{ $category->name }}</h2>
            </div>  
        @endforeach
    </div>
@endsection
@extends('layouts/app') 

@section('content') 

    {{--Boucle pour afficher les erreurs. Laravel s'occupe même des messages (mais en anglais par contre) --}}
    @foreach ($errors->all() as $error)
    {{ $error}}
    @endforeach

    <form action="" method="post">
        @csrf {{-- Anytime you define an HTML form in your application, you should include a hidden CSRF token field in the form so that the CSRF protection middleware can validate the request.--}}
        <input type="text" name="name" value="{{ old('name') }}">
        <button>Sauvegarder</button>
    </form>
    
@endsection
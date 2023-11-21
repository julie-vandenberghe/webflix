@extends('layouts/app') 



@section('content')

    <form action="" method="post">
        @csrf
        <input type="text" name="email" value="{{ old('email') }}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        <input type="password" name="password">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        <button>Connexion</button>
    </form>

@endsection
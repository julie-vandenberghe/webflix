@extends('layouts/app') 

@section('content')

    <form action="" method="post">
        @csrf
        <input type="text" name="email">
        <input type="password" name="password">
        <button>Connexion</button>
    </form>

@endsection
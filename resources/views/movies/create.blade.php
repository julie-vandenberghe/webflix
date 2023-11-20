@extends('layouts/app') 

@section('content') 

<h1 class="mb-4 text-4xl font-extrabold">Add a new movie</h1>

    {{--Boucle pour afficher les erreurs. Laravel s'occupe même des messages (mais en anglais par contre) --}}
    @foreach ($errors->all() as $error)
    {{ $error}}
    @endforeach

    <form action="" method="post" class="w-1/2 mx-auto" enctype="multipart/form-data">
        @csrf {{-- Anytime you define an HTML form in your application, you should include a hidden CSRF token field in the form so that the CSRF protection middleware can validate the request.--}}

        <div class="mb-4">
            <label for="title" class="block">Titre *</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="border-0 border-b focus:ring-0 w-full" >
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="synopsis" class="block">Synopsis *</label>
            <textarea name="synopsis" class="border-0 border-b focus:ring-0 w-full"  value="{{ old('synopsis') }}"></textarea>
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="duration" class="block">Duration *</label>
            <input type="text" name="duration" class="border-0 border-b focus:ring-0 w-full"  value="{{ old('duration') }}">
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="youtube" class="block">Youtube</label>
            <input type="text" name="youtube" class="border-0 border-b focus:ring-0 w-full"  value="{{ old('youtube') }}">
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="released_at" class="block">Released at</label>
            <input type="text" name="released_at" class="border-0 border-b focus:ring-0 w-full"  value="{{ old('released_at') }}">
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category" class="block">Catégorie</label>
            <select name="category" id="category" class="border-0 border-b border-gray-300 w-full">
                @foreach ($categories as $category)
                    <option @selected($category->id == old('category')) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <button>Sauvegarder</button>
    </form>
    
@endsection
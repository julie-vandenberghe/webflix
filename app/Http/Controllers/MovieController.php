<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MovieController extends Controller
{
    //Ici, on affiche toutes les catégories. Pour cela, on retourne le modèle movie
    public function index()
    {
        //return Movie::all(); //Fait un SELECT * FROM movies ... en Laravel :o
        return view('movies/index', [
            //'films' => Movie::all(), //Afficher tous les films 
            'films' => Movie::with('category')->get(), //La ligne ci-dessus fonctionne aussi mais est moins optimisée
        ]);
    }

    public function show($id)
    {

        $idFilm = collect(Movie::all())->pluck('id')->all();

        if (!in_array($id, $idFilm)) {
            abort(404); // Renvoie une 404
        }

        $filmFound = Movie::find($id); //Afficher 1 film

        //Les lignes ci-dessus peuvent être remplacées par :
        //$filmFound = Movie::findOrFail($id);
        //Si on trouve l'id, on affecte le tableau à $filmFound, sinon on fait abort(404);

        return view('movies/show', ['movie' => $filmFound]);
    }

    public function create()
    {
        return view('movies/create', [
            'categories' => Category::all()->sortBy('name'),
        ]);
    }

    public function store(Request $request)
    {
        //Vérification des données
        $request->validate([
            'title' => 'required|min:2',
            //title = obligatoire, min 2 caractères
            'synopsis' => 'required|min:10',
            'duration' => 'required|integer|min:1',
            'released_at' => 'nullable|date', //par défaut = nullable, donc pas obligé de le préciser
            'category' => 'nullable|exists:categories,id', //va vérifier que l'id dans categories existe
        ]);

        //Insertion en BDD
        $movie = new Movie();
        $movie->title = $request->title; //title : on peut mettre à la place input('title', 'valeur par défaut')
        $movie->synopsis = $request->synopsis;
        $movie->duration = $request->duration;
        $movie->youtube = $request->youtube;
        $movie->cover = 'upload/julie.jpg';
        $movie->released_at =  $request->released_at;
        $movie->category_id =  $request->category_id;

        $movie->save(); //Fait un INSERT INTO movies en Laravel :o

        return redirect('/films');
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        // On autorise la modif du film si l'id de l'user correspond à l'user_id associé dans la table pour ce film
        Gate::allowIf($movie->user_id == Auth::user()->id);

        return view('movies/edit', [
            'categories' => Category::all()->sortBy('name'),
            'movie' => $movie,
        ]);
    }

    public function update(Request $request, $id)
    {
        //Vérification des données
        $request->validate([
            'title' => 'required|min:2',
            'synopsis' => 'required|min:10',
            'duration' => 'required|integer|min:1',
            'released_at' => 'nullable|date',
            'category' => 'nullable|exists:categories,id',
        ]);

        //Insertion en BDD
        $movie = Movie::findOrFail($id); //Ici on va modifier le film
        $movie->title = $request->title; //title : on peut mettre à la place input('title', 'valeur par défaut')
        $movie->synopsis = $request->synopsis;
        $movie->duration = $request->duration;
        $movie->youtube = $request->youtube;
        $movie->cover = 'upload/julie.jpg';
        $movie->released_at =  $request->released_at;
        $movie->category_id =  $request->category_id;

        $movie->save(); //Fait un INSERT INTO movies en Laravel :o

        return redirect('/films');
    }

    public function destroy($id)
    {
        //Ces deux lignes ci-dessous ont été ajoutés car on teste si l'user a l'autorisation de supprimer le film
        $movie = Movie::findOrFail($id); //On récupére l'id de film à supprimer
        Gate::allowIf($movie->user_id == Auth::user()->id); //On autorise la suppression du film si l'id de l'user correspond à l'user_id associé dans la table pour ce film

        Movie::destroy($id); //DELETE FROM movies WHERE id...

        return redirect('/films');
    }
}

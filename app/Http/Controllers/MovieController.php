<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //Ici, on affiche toutes les catégories. Pour cela, on retourne le modèle movie
    public function index()
    {
        //return Movie::all(); //Fait un SELECT * FROM movies ... en Laravel :o
        return view('movies/index', [
            'films' => Movie::all(), //Afficher tous les films
        ]);
        
    }

    public function show($id) {

        $idFilm = collect(Movie::all())->pluck('id')->all();

        if(! in_array($id, $idFilm)) {
            abort(404); // Renvoie une 404
        }

        $filmFound = Movie::find($id); //Afficher 1 film

        //Les lignes ci-dessus peuvent être remplacées par :
        //$filmFound = Movie::findOrFail($id);
        //Si on trouve l'id, on affecte le tableau à $filmFound, sinon on fait abort(404);
   
        return view('movies/show', [
            'title' => $filmFound->title,
            'synopsis' => $filmFound->synopsis,
            'duration' => $filmFound->duration,

        ]);
    }

    public function create()
    {
        return view('movies/create');
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
}

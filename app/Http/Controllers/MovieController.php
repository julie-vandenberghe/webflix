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
        return view('films/index', [
            'films' => Movie::all(),
        ]);
        
    }

    public function show($id) {

        $idFilm = collect(Movie::all())->pluck('id')->all();

        if(! in_array($id, $idFilm)) {
            abort(404); // Renvoie une 404
        }

        $filmFound = Movie::find($id);
   
        return view('films/show', [
            'film' => $filmFound->title,
        ]);
    }

    public function create()
    {
        return view('films/create');
    }

    public function store(Request $request)
    {
        //Vérification des données
        $request->validate([
            'title' => 'required|min:2|unique:movies',
            //title = obligatoire, min 2 caractères, pas de doublon
            'synopsis' => 'required|min:10',
            'duration' => 'required',
        ]);
        
        //Insertion en BDD
        $movie = new Movie();
        $movie->title = $request->title;
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

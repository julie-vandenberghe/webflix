<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Ici, on affiche toutes les catégories. Pour cela, on retourne le modèle category
    public function index()
    {
        //return Category::all(); //Fait un SELECT * FROM categories ... en Laravel :o
        return view('categories/index', [
            'categories' => Category::all(),
        ]
    
    );
        
    }

    public function create()
    {
        return view('categories/create');
    }

    public function store(Request $request)
    {
        //Vérification des données
        $request->validate([
            'name' => 'required|min:3|unique:categories|max:10',
            //nom = obligatoire, min 3 caractères, pas de doublon, maximum 10 caractères
        ]);
        
        //Insertion en BDD
        $category = new Category();
        $category->name = 'Action'; //Laravel crée lui-même un tableau avec les attributs et leurs valeurs via la class Category et le "use HasFactory;"
        $category->save(); //Fait un INSERT INTO categories en Laravel :o

        return redirect('/categories');
    }
}

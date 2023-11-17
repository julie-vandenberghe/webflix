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

    public function store()
    {
        $category = new Category();
        $category->name = 'Action'; //Laravel crée lui-même un tableau avec les attributs et leurs valeurs via la class Category et le "use HasFactory;"
        $category->save(); //Fait un INSERT INTO categories en Laravel :o

        return redirect('/categories');
    }
}

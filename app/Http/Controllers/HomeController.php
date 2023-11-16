<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'name' => 'Julie',
            'games' => [
                'Super Mario',
                'Mario Kart',
                'Mario Party',
                'Mario Paint'
            ]
        ]);
    }

    // {friend} = paramétre obligatoire
// {friend?} = paramètre optionnel. Du coup, mettre $friend = null pour permettre que qd pas de paramètre, pas d'erreur.
    public function friend(Request $request, $friend = null)
    {
        return view('presentation', [
            'age' => Carbon::parse('1989-12-05')->age,
            'friend' => ucfirst($friend), // ucfirst permet d'avoir 1re lettre en majuscule
            'color' => $request->color,
        ]);
    }
}

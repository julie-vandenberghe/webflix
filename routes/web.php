<?php

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'name' => 'Julie',
        'games' => [
            'Super Mario',
            'Mario Kart',
            'Mario Party',
            'Mario Paint'
        ]
    ]);
});

// {friend} = paramétre obligatoire
// {friend?} = paramètre optionnel. Du coup, mettre $friend = null pour permettre que qd pas de paramètre, pas d'erreur.

Route::get('/julie/{friend?}', function (Request $request, $friend = null) {

    dump($request->color); //mm chose que $_GET['color'] ?? null;
    //dump($request('color')); //mm chose que $_GET['color'] ?? null;

    return view('presentation', [
        'age' => Carbon::parse('1989-12-05')->age,
        'friend' => ucfirst($friend), // ucfirst permet d'avoir 1re lettre en majuscule
        'color' => $request->color,
    ]);
    
});

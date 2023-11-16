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


Route::get('/a-propos', function () {
    return view('about', [
        'title' => 'Webflix',
        'team' => [
            ['prenom' => 'Julie', 'nom' => 'Vandenberghe', 'fonction' => 'développeuse', 'image' => 'https://i.pravatar.cc/100?u=julie'],
            ['prenom' => 'Angèle', 'nom' => 'Despretz', 'fonction' => 'développeuse', 'image' => 'https://i.pravatar.cc/100?u=angele'],
            ['prenom' => 'Loki', 'nom' => '🐱', 'fonction' => 'ronronneur', 'image' => 'https://i.pravatar.cc/100?u=loki'],
        ]
    ]);
});

Route::get('/a-propos/{user?}', function (Request $request, $user = null) {

    dump($request->user);

    return view('about', [
        'name' => 'À propos de notre équipe de développeurs',
        'teamDev' => [
            ['prenom' => 'Julie', 'nom' => 'Vandenberghe', 'fonction' => 'développeuse'],
            ['prenom' => 'Angèle', 'nom' => 'Despretz', 'fonction' => 'développeuse'],
            ['prenom' => 'Loki', 'nom' => '🐱', 'fonction' => 'ronronneur'],
        ],
        'user' => $request->user,
    ]);
});


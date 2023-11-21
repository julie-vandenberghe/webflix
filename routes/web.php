<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;

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

//Route sans Controller
// Route::get('/', function () {
//     return view('home', [
//         'name' => 'Julie',
//         'games' => [
//             'Super Mario',
//             'Mario Kart',
//             'Mario Party',
//             'Mario Paint'
//         ]
//     ]);
// });

//Route avec Controller
Route::get('/', [HomeController::class, 'index']);

//HomeController::class -> friend
Route::get('/julie/{friend?}', [HomeController::class, 'friend']);

//AboutController > index
Route::get('/a-propos', [AboutController::class, 'index']);

//AboutController > show
Route::get('/a-propos/{user}', [AboutController::class, 'show']);

//CRUD Catégories
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/creer', [CategoryController::class, 'create']); // pour afficher le formulaire
Route::post('/categories/creer', [CategoryController::class, 'store']); // pour traiter le formulaire

//CRUD Movies
Route::get('/films', [MovieController::class, 'index']);
Route::get('/film/{id}', [MovieController::class, 'show']); //Attention, si met un 's' pas moyen de distinguer avec ligne du dessous et va croire que films/creer = films/{id} ou alors rajouter ->whereNumber('id) à la fin de la ligne)
Route::get('/films/creer', [MovieController::class, 'create']); // pour afficher le formulaire
Route::post('/films/creer', [MovieController::class, 'store']); // pour traiter le formulaire
Route::get('/film/{id}/modifier', [MovieController::class, 'edit'])->middleware('auth'); //middleware = teste si l'user est conencté. Si ce n'est pas le cas, redirect vers la page auth
Route::post('/film/{id}/modifier', [MovieController::class, 'update'])->middleware('auth');
Route::get('/film/{id}/supprimer', [MovieController::class, 'destroy'])->middleware('auth');

//Authentification
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
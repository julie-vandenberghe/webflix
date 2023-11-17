<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

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

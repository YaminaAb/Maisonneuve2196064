<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Models\Etudiant;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Définir les routes
// page d'acceuil 
Route::get('/', [EtudiantController::class, 'index']);

//Formulaire d'ajout 
Route::get('/create/post', [EtudiantController::class, 'create']);

//l'ajout d'un nouveau étudiant 
Route::post('/create/post', [EtudiantController::class, 'store']);

//Afficher les détaile d'un étudiant dans une autre page 
Route::get('/-{etudiant}', [EtudiantController::class , 'show']);

//Formulaire de modification
Route::get('/-{etudiant}/edit', [EtudiantController::class , 'edit'] );

//Modification 
Route::put('/-{etudiant}/edit', [EtudiantController::class , 'update'] );

//suppression
Route::get('/-{etudiant}/delete', [EtudiantController::class, 'destroy']);



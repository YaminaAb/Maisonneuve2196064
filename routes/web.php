<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LocalizationController;


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


/**
 * 
 */
// La page index est une page de connexion (login) 
Route::get('/', [CustomAuthController::class, 'index'])->name('login');
Route::post('/', [CustomAuthController::class, 'authentication'])->name('login.authentication');
// logout
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

//Création d'un utilisateur (étudiant)
Route::get('/registration', [CustomAuthController::class, 'create'])->name('user.registration');
//Ajout de l'utilisateur (Étudiant)
Route::post('/user-registration', [CustomAuthController::class, 'store'])->name('user.store');

//Page des articles 
/**Affichage */
Route::get('/index', [ArticleController::class, 'index'])->name('article.index')->middleware('auth');
/**Création */
Route::get('/creation', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('/creation-post', [ArticleController::class, 'store'])->name('article.store')->middleware('auth');
/**Modiffication */
Route::get('/index-{article}/edit', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
Route::put('/index-{article}/edit', [ArticleController::class, 'update'])->name('article.edit')->middleware('auth');
/**Suppression */
Route::get('/index-{article}/delete', [ArticleController::class, 'destroy'])->name('article.delete')->middleware('auth');

// Rénisialitation mot de passe 
Route::get('/forgot-password', [CustomAuthController::class, 'forgotPassword'])->name('forgot.Password');
Route::post('/forgot-password', [CustomAuthController::class, 'tempPassword'])->name('temp.Password');
Route::get('/new-password/{user}/{tempPassword}', [CustomAuthController::class, 'newPassword'])->name('new.Password');
Route::post('/new-password/{user}/{tempPassword}', [CustomAuthController::class, 'storeNewPassword'])->name('store.new.password');

//Page Étudiant 
Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');
//Afficher les détaile d'un étudiant dans une autre page 
Route::get('/-{etudiant}', [EtudiantController::class , 'show'])->name('etudiant.show');

//Formulaire de modification
Route::get('/-{etudiant}/edit', [EtudiantController::class , 'edit'])->name('etudiant.edit');

//Modification 
Route::put('/-{etudiant}/edit', [EtudiantController::class , 'update'])->name('etudiant.edit');

//suppression
Route::get('/-{etudiant}/delete', [EtudiantController::class, 'destroy'])->name('etudiant.delete');

/**Files */
//Ajouter un document
Route::get('/add-file', [FileController::class, 'create'])->name('file.add')->middleware('auth');;
Route::post('/add-file', [FileController::class, 'upload'])->name('file.store')->middleware('auth');;
//Affichage des document
Route::get('/files', [FileController::class, 'index'])->name('file.index')->middleware('auth');
/**Suppression */
Route::get('/files-{file}/delete', [FileController::class, 'destroy'])->name('file.delete')->middleware('auth');
/**Modiffication */
Route::get('/files-{file}/edit', [FileController::class, 'edit'])->name('file.edit')->middleware('auth');
Route::put('/files-{file}/edit', [FileController::class, 'update'])->name('file.edit')->middleware('auth');
/**Téléchargement */
Route::get('/files-{file}/download', [FileController::class, 'download'])->name('file.download')->middleware('auth');

//langue
Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');





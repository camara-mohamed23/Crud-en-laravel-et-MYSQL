<?php
use App\Http\Controllers\PersonneController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controlleur;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

Route::get('/ajouter', ...) : La route accède à l'URL http://127.0.0.1:8000/ajouter.
[PersonneController::class, 'create'] : Laravel appelle la méthode create() du contrôleur PersonneController.
->name('ajouter') : La route est nommée ajouter, ce qui vous permet de l'utiliser comme route('ajouter') dans la vue.
|
*/
Route::get('/', [controlleur::class, 'index']) ->name('index');
Route::get('/ajouter', [controlleur::class, 'create'])->name('ajouter');
Route::get('/modifier/{id}', [controlleur::class, 'edit']) ->name('modifier');
Route::get('/supprimer/{id}', [controlleur::class, 'update'])->name('supprimer');
Route::put('/update/{id}', [controlleur::class, 'update'])->name('update');
Route::delete('/supprimer/{id}', [controlleur::class, 'destroy'])->name('supprimer');



Route::post('/store', [controlleur::class, 'store'])->name('store');

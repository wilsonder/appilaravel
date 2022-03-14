<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ComentariosController;

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

// Genera CSRF Token para usarlo en postman
Route::get('/token', function () {
    return csrf_token(); 
});

// Rutas CRUD Post
Route::post('/posts/create', [PostsController::class, 'create']);
Route::get('/posts/ver/{slug}', [PostsController::class, 'ver']);
Route::get('/posts/vertodo', [PostsController::class, 'verTodo']);
Route::get('/posts/edit/{slug}', [PostsController::class, 'edit']);
Route::put('/posts/update/{slug}', [PostsController::class, 'update']);
Route::delete('/posts/delete/{slug}', [PostsController::class, 'delete']);

// Rutas CRUD Comentarios
Route::post('/comentarios/create', [ComentariosController::class, 'create']);
Route::get('/comentarios/ver/{slug}', [ComentariosController::class, 'ver']);
Route::get('/comentarios/vertodo', [ComentariosController::class, 'verTodo']);
Route::get('/comentarios/edit/{slug}', [ComentariosController::class, 'edit']);
Route::put('/comentarios/update/{slug}', [ComentariosController::class, 'update']);
Route::delete('/comentarios/delete/{slug}', [ComentariosController::class, 'delete']);


// Rutas CRUD Categorias
Route::post('/categorias/create', [CategoriasController::class, 'create']);
Route::get('/categorias/ver/{slug}', [CategoriasController::class, 'ver']);
Route::get('/categorias/vertodo', [CategoriasController::class, 'verTodo']);
Route::get('/categorias/edit/{slug}', [CategoriasController::class, 'edit']);
Route::put('/categorias/update/{slug}', [CategoriasController::class, 'update']);
Route::delete('/categorias/delete/{slug}', [CategoriasController::class, 'delete']);
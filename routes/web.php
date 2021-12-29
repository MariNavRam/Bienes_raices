<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasaController;

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
//     return view('anuncios');
// });
Route::get('/anuncios', [App\Http\Controllers\CasaController::class, 'dashboard'])->name('dashboard');
Route::get('/', [App\Http\Controllers\CasaController::class, 'dashboard'])->name('dashboard2');
Route::get('/anuncio/{id}', [App\Http\Controllers\CasaController::class, 'anuncio'])->name('anuncio');

Route::get('/404', function () {
    return view('404');
});
// Route::get('/anuncios', function () {
//     return view('anuncios');
// });
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/contacto', function () {
    return view('contacto');
});
Route::get('/entrada', function () {
    return view('entrada');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/inicio', function () {
    return view('inicio');
});
Route::get('/nosotros', function () {
    return view('nosotros');
});
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/inventario', function () {
    return view('dashboard');
});
Route::get('/files', function () {
    return view('files');
});
Route::post('/casas/search', [CasaController::class, 'search']);
Route::get('/casas/search', [CasaController::class, 'index']);

Route::get('notificar', [CasaController::class, 'notificar'])->name('notificar');



Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route:: resource('/casas', CasaController::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});

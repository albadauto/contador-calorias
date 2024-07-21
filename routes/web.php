<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
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
Route::prefix('/')->group(function(){
    Route::get('/', [HomeController::class, 'Index'])->name('home.index');
    Route::post('/InserirAlmoco', [HomeController::class, 'InserirAlmoco'])->name('home.inseriralmoco');
    Route::post('/InserirJanta', [HomeController::class, 'InserirJanta'])->name('home.inserirjanta');
    Route::post('/InserirCafeTarde', [HomeController::class, 'InserirCafeTarde'])->name('home.inserircafetarde');
    Route::post('/InserirCafe', [HomeController::class, 'InserirCafe'])->name('home.inserircafe');
    Route::get('/DeletarKcal/{tabela}/{id}', [HomeController::class, 'DeletarKcal'])->name('home.deletarkcal');


});

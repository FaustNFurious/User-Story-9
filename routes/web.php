<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;

/* Rotta pagina Home */
Route::get('/', [PublicController::class, 'home'])->name('Home');


/* Rotta pagina Dashboard */
Route::get('/dashboard', [DashboardController::class, 'main'])->name('dashboard');


/* Rotte articoli */
/* Rotta pagina per creare un articolo */
Route::get('/create/article', [ArticleController::class, 'createArticle'])->name('article.create');

/* Rotta pagina per visualizzare tutti gli articoli */
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');

/* Rotta pagina per mostrare i dettagli di un articolo */
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');


/* Rotta per collegare le categorie agli articoli */
Route::get('/articles/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
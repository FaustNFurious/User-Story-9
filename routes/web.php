<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RevisorController;

/* Rotta pagina Home */
Route::get('/', [PublicController::class, 'home'])->name('Home');


/* Rotta pagina Dashboard */
Route::get('/dashboard', [DashboardController::class, 'main'])->name('dashboard');



/* Rotte pagine articoli */
/* Rotta pagina per creare un articolo */
Route::get('/create/article', [ArticleController::class, 'createArticle'])->name('article.create');

/* Rotta pagina per visualizzare tutti gli articoli */
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');

/* Rotta pagina per mostrare i dettagli di un articolo */
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

/* Rotta per collegare le categorie agli articoli */
Route::get('/articles/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');



/* Rotta area riservata al revisore */
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

/* Rotte per accettare o rifiutare un articolo */
Route::patch('/revisor/accept/article/{article}', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
Route::patch('/revisor/reject/article/{article}', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');

/* Rotta richiesta per diventare revisore */
Route::get('/revisor/request', [RevisorController::class, 'requestRevisor'])->middleware('auth')->name('revisor.request');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');


/* Rotta per effettuare una ricerca */
Route::get('/search', [PublicController::class, 'search'])->name('article.search');


/* Rotta per cambiare la lingua */
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
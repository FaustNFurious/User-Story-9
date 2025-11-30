<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller implements HasMiddleware
{

    // Costruttore per applicare il middleware di autenticazione
    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['createArticle'])
        ];
    }

    public function createArticle()
    {
        return view('article.create');
    }

    public function index()
    {
        // Recupera gli articoli ordinati per data di creazione, 6 per pagina
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);
        return view('article.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }


    public function byCategory(Category $category)
    {
        // Recupera gli articoli appartenenti alla categoria selezionata
        return view('article.byCategory', ['articles' => $category->articles, 'category' => $category]);
    }

}
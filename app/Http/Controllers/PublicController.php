<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Article;

class PublicController extends Controller
{
    
    public function home() 
    {
        // Fetch the 6 most recent articles
        $articles = Article::where('is_accepted', true)->take(6)->orderBy('created_at', 'desc')->get();
        return view('welcome', compact('articles'));
    }

    public function search(Request $request) 
    {
        $query = $request->input('query');
        // Perform search on articles
        $articles = Article::search($query)->where('is_accepted', true)->paginate(10);
        return view('article.searched', ['articles' => $articles, 'query' => $query]);
    }

}

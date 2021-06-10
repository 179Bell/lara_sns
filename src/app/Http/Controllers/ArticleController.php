<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        
        return view('articles.index',['articles'=>$articles]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request,Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->save();
        return redirect()->route('top');
    }
    
    public function edit(Article $article)
    {
        return view('articles.edit',['article'=>$article]);
    }    

    public  function update(ArticleRequest $request,Article $article)
    {
        $article->fill($request->all())->save();
        return redirect()->route('top');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('top');
    }

    public function show(Article $article)
    {
        $article->get()->all();
        //dd($article);
        // return view('articles.show',['article'=>$article]);
    }
}

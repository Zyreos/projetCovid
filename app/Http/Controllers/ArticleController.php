<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Category;

class ArticleController extends Controller
{


    /*public function __construct(Category $category)
    {
        $this->category = $category;
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        $categories = Category::all();
        return view('articles.index', compact('articles','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$article = new Article;
        $article->name = $request->input('name');
        $article->price = $request->input('price');
        $article->description = $request->input('description');
        $article->dimensions = $request->input('dimensions');
        $article->quantity = 0;*/

        //$category = $request->input('id');

        //$article->category_id = $category->id;

        Article::create($request->all());

        //$article-> save();
        return redirect()->route('articles.index')->with('info', 'Larticle a bien été créé');
        //return redirect('articles/' . $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //$article = Article::find($id);
        //$categories = Category::all();
        $category = $article->category->name;
        return view('articles.show',compact('article','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', array('article' => $article));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article -> name = $request -> input('name');
        $article -> price = $request -> input('price');
        $article -> description = $request -> input('description');
        $article -> dimensions = $request -> input('dimensions');
        $article -> category_id = $request -> input('category_id');
        $article -> quantity = 0;

        $article -> save();

        return redirect('articles/' . $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article -> destroy($id);
        return redirect('articles');
    }
}

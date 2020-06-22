<?php

namespace App\Http\Controllers;

use App\Command;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Auth;

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
        Article::create($request->all());
        return redirect()->route('articles.index')->with('info', 'Larticle a bien été créé');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commands = Command::all();

        //$command = Command::where('user_id' ,'=', $command->user_id)->get($id);
        $article = Article::find($id);
        $category = $article->category->name;
        return view('articles.show',compact('article','category', 'commands'));
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
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return redirect()->route('articles.index')->with('info', 'Larticle a bien été misà jour');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateQuantity(Request $request, Article $article)
    {
        $article->update(['quantity' => $request->quantity,
                          'total_price' => $request->total_price]);
        /*$command = Command::all();
        $command = Command::where('command_id' ,'=', $command->id)->get();*/
        //$article->update($request->all());
                /*$article->quantity = $request->input('quantity');
        $article->save();*/
        return redirect()->back();
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
        $article->destroy($id);
        return redirect('articles');
    }
}

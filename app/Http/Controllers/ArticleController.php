<?php

namespace App\Http\Controllers;

use App\Command;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Picture;
use App\Category;
use App\Gestion\FileUploadGestion;
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
        return view('welcome', compact('articles','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Article::create($request->all());

        $article = new Article;
        $article -> name = $request -> input('name');
        $article -> price = $request -> input('price');
        $article -> description = $request -> input('description');
        $article -> dimensions = $request -> input('dimensions');
        $article -> category_id = $request -> input('category_id');
        $article -> save();

        $pictures = $request->file('pictures');
        $extension = $pictures->getClientOriginalExtension();
        $pictures_name = 'article_' . $article->id;

        FileUploadGestion::uploadFile($pictures, $pictures_name, '/img/articles');

        $path = '/img/articles/' . $pictures_name . '.' .$extension;

        $pictures = new Picture;
        $pictures -> path = $path;
        $pictures -> article_id = $article->id;
        $pictures -> save();

        $article -> save();
        return redirect()->route('articles.index')->with('info', 'Larticle a bien été créé');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $commands = Command::all();

        //$command = Command::where('user_id' ,'=', $command->user_id)->get($id);
        $article = Article::find($id);
        $category = $article->category->name;

        $is_checked_user =false;

        //$user = Auth::user();
        $user = $request->user();

        if ((!Auth::user() && (!$commands || $commands=="[]")) || !Auth::user())
        {
            $commands = null;
            return view('articles.show',compact('article','category','is_checked_user', 'commands'));

        }

        if (Auth::user() && $user->has_basket == true)
        {
            //$command =  Command::where('user_id', "=", Auth::id())->where('status_id', "=", 1)->get();

            //$commands = $user->commands();

            //var_dump($command->id);
            //die();

            foreach ($commands as $command)
            {
                if ($command->status_id == 1)
                {
                    $goodCommand = $command;
                    //return view('articles.show',compact('article','category','is_checked_user','goodCommand', 'user'));
                }
            }


            return view('articles.show',compact('article','category','is_checked_user','goodCommand' ,'user'));
        }

        if (Auth::user() && $user->has_basket == false)
        {
            return view('articles.show', compact('article', 'category', 'commands', 'is_checked_user', 'user'));
        }

        return view('articles.show', compact('article', 'category', 'commands', 'is_checked_user', 'user'));
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
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article -> name = $request -> input('name');
        $article -> price = $request -> input('price');
        $article -> description = $request -> input('description');
        $article -> dimensions = $request -> input('dimensions');
        $article -> category_id = $request -> input('category_id');
        $article -> save();

        $pictures = $request->file('pictures');

        if(isset($picture)){

            $extension = $pictures->getClientOriginalExtension();
            $pictures_name = 'article_' . $article->id;

            FileUploadGestion::uploadFile($pictures, $pictures_name, '/img/articles');

            $path = '/img/articles/' . $pictures_name . '.' .$extension;

            $pictures = new Picture;
            $pictures -> path = $path;
            $pictures -> article_id = $article->id;
            $pictures -> save();

            $article -> save();

        }


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

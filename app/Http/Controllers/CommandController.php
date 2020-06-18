<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Command;
use App\User;
use App\Delivery;
use App\Address;
use App\Status;
use Illuminate\Support\Facades\Auth;
use App\Article;


class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commands = Command::all();
        $statuses = Status::all();
        $deliveries = Delivery::all();
        $addresses = Address::all();
        $users = User::all();
        return view('commands.index', compact('commands','statuses', 'deliveries','addresses','users' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        $deliveries = Delivery::all();
        $addresses = Address::all();
        $users = User::all();
        $articles = Article::all();
        return view('commands.create', compact('statuses', 'deliveries','addresses','users','articles' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Resquest $request)
    {
        //$command = new Command();
        //$command->user_id = Auth::id();
        //return $command->save();
        //ceci est le code qui fonctionne sans les articles
        //1Command::create($request->all());

        //ceci est un test pour la relation avec article
        $command = Command::create($request->all());
        $command->articles()->attach($request->articles);
        return redirect()->route('commands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $command = Command::find($id);
        $status = $command->status->name;
        $delivery = $command->delivery->mode;
        $delivery_address = $command->delivery->address;
        $bill_address = $command->address;
        $user = $command->user;
        $big_user = Auth::user();

        //ceci est un test pour la relation avec article
        $command->with('articles')->get();
        return view('commands.show', compact('command','status','delivery','address','user','bill_address','delivery_address','big_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $command = Command::find($id);
        $statuses = Status::all();
        $deliveries = Delivery::all();
        $users = User::all();
        return view('commands.edit', compact('command','statuses', 'deliveries','users' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Command $command)
    {
        $command->update($request->all());
        return redirect()->route('commands.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateWithArticle(Request $request, Command $command)
    {
        $command->update($request->all());
        //ceci est un test
        $command->articles()->sync($request->articles);
        return redirect()->route('commands.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createAddress($id)
    {
        $command = Command::find($id);
        $statuses = Status::all();
        $deliveries = Delivery::all();
        $users = User::all();
        $address = new Address;
        return view('commands.editFacturation', compact('command','statuses', 'deliveries','users', 'address' ));
    }


    public function storeAddress(Request $request, Command $command)
    {
        $command->update($request->all());
        Address::create($request->all());
        return redirect()->route('commands.updateWithAddress', [$command])->withInput();
        //return $command->update();
        //return redirect()->action('CommandController@edit',['command']);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Command $command
     * @return \Illuminate\Http\Response
     */
    public function updateWithAddress(Request $request, Command $command)
    {

        $command->update($request->all());
        var_dump (old('postcode'));
        die();
        return redirect()->route('commands.index');
        //return redirect('commands.index');

    }



        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $command = Command::find($id);
        $command -> destroy($id);
        return redirect('commands');
    }
}

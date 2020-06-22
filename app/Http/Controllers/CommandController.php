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
use Illuminate\Support\Facades\Session;


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
    public function store(Request $request)
    {
        //$command = new Command();
        //$command->user_id = Auth::id();
        //return $command->save();
        //ceci est le code qui fonctionne sans les articles
        //1Command::create($request->all());
        //ceci est un test pour la relation avec article

        $command = Command::create(['status_id' => 1,
                                    'user_id' => Auth::id()]);

        $article = Article::findOrFail($request->id);
        $article_quantity = Article::findOrFail($request->quantity);
        $command->articles()->attach($article);
        return redirect()->route('commands.index');
    }

    public function basket($id) {
        $command = Command::find($id);
        $user = $command->user;

        $articles = $command->articles;
;

        return view('commands.basket',compact('command','user','articles'));
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
        if ($command->status_id!=null){$status = $command->status->name;}
        if ($command->delivery_id!=null){$delivery = $command->delivery->mode;}
        if ($command->delivery->address!=null){$delivery_address = $command->delivery->address;}
        if ($command->address_id!=null){$bill_address = $command->address;}

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

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Command $command
     * @param Address $address
     * @return \Illuminate\Http\Response
     */
    public function updateWithAddress(Request $request, Command $command, Address $address)
    {
        $inputs = $request->input();
        $address_id = $address::create($inputs)->id;
        $command->address_id = $address_id;
        $command->update($request->all());
        return redirect()->route('commands.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createDeliveryWithAddress($id)
    {
        $command = Command::find($id);
        $statuses = Status::all();
        $users = User::all();
        $delivery = new Delivery;
        $address = new Address;
        return view('commands.editDelivery', compact('command','statuses', 'delivery','users', 'address' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Command $command
     * @param Address $address
     * @param Delivery $delivery
     * @return \Illuminate\Http\Response
     */

    public function updateWithDelivery(Request $request, Command $command, Address $address, Delivery $delivery)
    {
        $inputs = $request->input();
        $address_id = $address::create($inputs)->id;
        //$inputs = $request->input();
        //$delivery_id = $delivery::create($inputs)->id;
        //$delivery->address_id = $address_id;
        //$delivery::create($request->all());
        $delivery->mode = $request -> input('mode');
        $delivery->price = $request -> input('price');
        $delivery->address_id = $address_id;
        $delivery->save();

        $delivery_id = $delivery->id;
        $command->delivery_id = $delivery_id;
        $command->update($request->all());
        //return redirect()->route('delirevies.updateWithDeliveryWithAddress',['address','delivery']);
        //return redirect()->action('DeliveryController@updateWithAddress1',['address','delivery']);
        return redirect()->route('commands.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createDeliveryWithAddressRetrait($id)
    {
        $command = Command::find($id);
        $statuses = Status::all();
        $users = User::all();
        $delivery = new Delivery;
        $addresses = Address::all();
        return view('commands.editDeliveryRetrait', compact('command','statuses', 'delivery','users', 'addresses' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Command $command
     * @param Address $address
     * @param Delivery $delivery
     * @return \Illuminate\Http\Response
     */

    public function updateWithDeliveryRetrait(Request $request, Command $command, Address $address, Delivery $delivery)
    {
        //$inputs = $request->input();
        //$delivery_id = $delivery::create($inputs)->id;
        //$delivery->address_id = $address_id;
        //$delivery::create($request->all());
        //$inputs = $request->input();
        //$address_id = $address($inputs)->id;
        //$delivery->mode = $request->input('mode');
        //$delivery->price = $request->input('price');
        //$delivery->address_id = $address->id;
        //$delivery->save();
        //$delivery_id = $delivery->id;

        /*$delivery= Delivery::create(['mode'=> $request->input(),
                          'price'=> $request->input(),
                           'address_id'=> $address_id]);*/

        /*$inputs = $request->input();
        $address_id = $address::create($inputs)->id;
        $command->address_id = $address_id;
        $command->update($request->all());*/

        //$delivery->mode = $request -> input('mode');
        //$delivery->price = $request -> input('price');
        //$delivery->address_id = $address->id;
        //$delivery->save();
        $inputs = $request->input();
        $delivery_id = $delivery::create($inputs)->id;

        //$delivery_id = $delivery->id;
        $command->delivery_id = $delivery_id;
        $command->total = $request->input('total');
        $command->save();

        //$command->delivery_id = $delivery_id;
        //$command->update($request->all());
        //return redirect()->route('delirevies.updateWithDeliveryWithAddress',['address','delivery']);
        //return redirect()->action('DeliveryController@updateWithAddress1',['address','delivery']);
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
        $article = Article::findOrFail($request->id);

        //$command = Command::where('user_id' ,'=', $command->user_id)->get();
        $command->articles()->attach($article);
        return redirect()->route('commands.index');
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

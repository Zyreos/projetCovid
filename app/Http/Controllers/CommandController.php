<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Command as Command;
use App\User as User;
use App\Delivery as Delivery;
use App\Status as Status;

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
        return view('commands.index', array('commands'=> $commands));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $command = new Command;
        $command -> date_validation = date("Y-m-d H:i:s");
        $command -> total_definitive = $request -> input('total_definitive');
        $command -> user_id = $request -> input('user_id');
        $command -> status_id = $request -> input('status_id');
        $command -> delivery_id = $request -> input('delivery_id');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $command = Command::find($id);
        return view('commands.show', array('command'=> $command));
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
        return view('commands.edit', array('command'=> $command));
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
        $command = Command::find($id);
        $command -> date_validation = date("Y-m-d H:i:s");
        $command -> total_definitive = $request -> input('total_definitive');
        $command -> user_id = $request -> input('user_id');
        $command -> status_id = $request -> input('status_id');
        $command -> delivery_id = $request -> input('delivery_id');

        $command-> save();

        return("Command Updated");
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

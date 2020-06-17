<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Command;
use App\User;
use App\Delivery;
use App\Address;
use App\Status;

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
        return view('commands.create', compact('statuses', 'deliveries','addresses','users' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Command::create($request->all());
        return redirect()->route('commands.edit');
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
        $status = $command->status->name;
        $delivery = $command->delivery->mode;
        $delivery_address = $command->delivery->address;
        $bill_address = $command->address;
        $user = $command->user;
        $user_id = session('user');
        return view('commands.show', compact('command','status','delivery','address','user','bill_address','delivery_address','user_id'));
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

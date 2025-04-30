<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('Clients.index' , compact('clients'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request -> id == 0){
            Client::create([
                'name' => $request -> name,
                'phone' =>  $request -> phone ?? "",
                'address' => $request ->address ?? "" ,
                'phone2' => $request -> phone2 ?? "" ,
                'mobile' => $request -> mobile ?? "" ,
                'user_ins'=> Auth::user()-> id ,
                'user_upd' => 0
            ]);
            return redirect()->route('clients')->with('success' ,  __('main.saved'));

        } else {
            return $this -> update($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        if($client ){
            echo json_encode($client);
            exit();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $client = Client::find($request -> id);
        if($client){
            $client -> update([
                'name' => $request -> name,
                'phone' =>  $request -> phone ?? "",
                'address' => $request ->address ,
                'phone2' => $request -> phone2 ?? "",
                'mobile' => $request -> mobile ?? "",
                'user_upd' => Auth::user()-> id
            ]);
        }
        return redirect()->route('clients')->with('success' ,  __('main.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if($client){
            $client->delete();
            return redirect()->route('clients')->with('success' ,  __('main.deleted'));

        }
    }
}

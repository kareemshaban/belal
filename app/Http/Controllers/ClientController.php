<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Client::all();
        return view('admin.Client.index', compact('suppliers'));
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
            $request->validate([
                    'name' => 'required|unique:clients,name',
                    'type' => 'required',
                ]
                , [
                    'type.required' => __('main.type_required'),
                    'name.required' => __('main.name_required'),
                    'name.unique'   => __('main.name_unique'),
                ]
            );
            Client::create([
                'type' => $request -> type, // 0 client , 1 supplier , 2 both
                'name' => $request -> name,
                'phone' => $request -> phone ?? "",
                'buffalo_min_limit' => $request -> buffalo_min_limit ?? 0,
                'buffalo_max_limit' => $request -> buffalo_max_limit ?? 0,
                'bovine_min_limit' => $request -> bovine_min_limit ?? 0,
                'bovine_max_limit' => $request -> bovine_max_limit ?? 0,
                'address' => $request -> address ?? "",
                'user_ins' => Auth::user() -> id,
                'user_upd' => 0,
            ]);
            return redirect()->route('suppliers') -> with('success', __('main.saved'));
        } else{
            return  $this -> update($request);
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
        $supplier = Client::find($id);
        echo json_encode($supplier);
        exit();
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
        $request->validate([
            'type' => [
                'required'
            ],
            'name' => [
                'required',
                Rule::unique('clients', 'name')->ignore($request -> id),
            ],
        ], [
            'type.required' => __('main.type_required'),
            'name.required' => __('main.name_required'),
            'name.unique'   => __('main.name_unique'),
        ]);
        $client = Client::find($request -> id);
        if($client){
            $client -> update([
                'type' => $request -> type, // 0 client , 1 supplier , 2 both
                'name' => $request -> name,
                'phone' => $request -> phone ?? "",
                'buffalo_min_limit' => $request -> buffalo_min_limit ?? 0,
                'buffalo_max_limit' => $request -> buffalo_max_limit ?? 0,
                'bovine_min_limit' => $request -> bovine_min_limit ?? 0,
                'bovine_max_limit' => $request -> bovine_max_limit ?? 0,
                'address' => $request -> address ?? "",
                'user_upd' => Auth::user() -> id
            ]);

            return redirect()->route('suppliers') -> with('success', __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Client::find($id);
        if($supplier){
            $supplier -> delete();
            return redirect()->route('suppliers') -> with('success', __('main.deleted'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ItemsController extends Controller
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
        $items = Items::all();
        return view('admin.Items.index', compact('items'));
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
                    'code' => 'required|unique:items,code',
                    'name' => 'required|unique:items,name',
                ]
                , [
                    'code.required' => __('main.code_required'),
                    'code.unique'   => __('main.code_unique'),
                    'name.required' => __('main.name_required'),
                    'name.unique'   => __('main.name_unique'),
                ]
            );
            Items::create([
                'code' => $request -> code,
                'name' => $request -> name,
                'details' => $request -> details ?? "",
                'default_selling_price' => $request -> default_selling_price ?? "0",
                'user_ins' => Auth::user()->id,
                'user_upd' => 0
            ]);

            return redirect()->route('items') -> with('success', __('main.saved'));

        } else {
            return $this -> update($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Items::find($id);
        echo json_encode($item);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'code' => [
                'required',
                Rule::unique('items', 'code')->ignore($request -> id),
            ],
            'name' => [
                'required',
                Rule::unique('items', 'name')->ignore($request -> id),
            ],
        ], [
            'code.required' => __('main.code_required'),
            'code.unique'   => __('main.code_unique'),
            'name.required' => __('main.name_required'),
            'name.unique'   => __('main.name_unique'),
        ]);

        $item = Items::find($request -> id) ;
        if($item){
            $item -> update([
                'code' => $request -> code,
                'name' => $request -> name,
                'details' => $request -> details ?? "",
                'default_selling_price' => $request -> default_selling_price ?? "0",
                'user_upd' => Auth::user()->id
            ]);
            return redirect()->route('items') -> with('success', __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Items::find($id);
        if($item){
            $item -> delete();
            return redirect()->route('items') -> with('success', __('main.deleted'));
        }
    }
}

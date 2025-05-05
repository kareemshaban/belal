<?php

namespace App\Http\Controllers;

use App\Models\Safe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SafeController extends Controller
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
        $safes = Safe::all();
        return view('admin.Safe.index', compact('safes'));
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
                    'code' => 'required|unique:safes,code',
                    'name' => 'required|unique:safes,name',
                ]
                , [
                    'code.required' => __('main.code_required'),
                    'code.unique'   => __('main.code_unique'),
                    'name.required' => __('main.name_required'),
                    'name.unique'   => __('main.name_unique'),
                ]
            );
            Safe::create([
                'name' => $request -> name,
                'code' => $request -> code,
                'details' => $request -> details ?? "",
                'user_ins' => Auth::user()->id,
                'user_upd' => 0
            ]);

            return  redirect() -> route('safes') -> with('success', __('main.saved'));
        } else {
            return $this -> update($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Safe  $safe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $safe = Safe::find($id);
        echo json_encode($safe);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Safe  $safe
     * @return \Illuminate\Http\Response
     */
    public function edit(Safe $safe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Safe  $safe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'code' => [
                'required',
                Rule::unique('safes', 'code')->ignore($request -> id),
            ],
            'name' => [
                'required',
                Rule::unique('safes', 'name')->ignore($request -> id),
            ],
        ], [
            'code.required' => __('main.code_required'),
            'code.unique'   => __('main.code_unique'),
            'name.required' => __('main.name_required'),
            'name.unique'   => __('main.name_unique'),
        ]);
        $safe = Safe::find($request -> id);
        if($safe){
            $safe -> update([
                'name' => $request -> name,
                'code' => $request -> code,
                'details' => $request -> details ?? "",
                'user_upd' => Auth::user()->id
            ]);

            return  redirect() -> route('safes') -> with('success', __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Safe  $safe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $safe = Safe::find($id);
        if($safe){
            $safe -> delete();
            return  redirect() -> route('safes') -> with('success', __('main.deleted'));
        }
    }
}

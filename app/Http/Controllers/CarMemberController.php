<?php

namespace App\Http\Controllers;

use App\Models\CarMember;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($supplier_id)
    {
        $members = DB::table('car_members')
            -> join('clients' , 'car_members.supplier_id' , '=' , 'clients.id')
            -> select('car_members.*' , 'clients.name as supplier_name')
            -> where('car_members.supplier_id' , '=' ,$supplier_id )
            -> get();

        $suppliers = Client::where('car_id' , '<>' , 0) -> get();
        $supplier = Client::find($supplier_id);

        return view('admin.Client.members.index' , compact('members' , 'suppliers' , 'supplier'));


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
                    'name' => 'required|unique:car_members,name',
                    'supplier_id' => 'required',
                ]
                , [
                    'supplier_id.required' => __('main.supplier_required'),
                    'name.required' => __('main.name_required'),
                    'name.unique'   => __('main.name_unique'),
                ]
            );



            CarMember::create([
                'supplier_id' => $request -> supplier_id,
                'name' => $request -> name,
                'phone' => $request -> phone ?? "",
                'address' => $request -> address ?? "",
                'user_ins' => Auth::user() -> id,
                'user_upd' => 0,
            ]);
            return redirect()->route('carMembers' , $request -> supplier_id) -> with('success', __('main.saved'));
        } else{
            return  $this -> update($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarMember  $carMember
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = DB::table('car_members')
            -> join('clients' , 'car_members.supplier_id' , '=' , 'clients.id')
            -> select('car_members.*' , 'clients.name as supplier_name')
            -> where('car_members.supplier_id' , '=' ,$id )
            -> first();
        echo json_encode($member);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarMember  $carMember
     * @return \Illuminate\Http\Response
     */
    public function edit(CarMember $carMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarMember  $carMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $member = CarMember::find($request -> id);
        if($member){
            $member -> update([
                'supplier_id' => $request -> supplier_id,
                'name' => $request -> name,
                'phone' => $request -> phone ?? "",
                'address' => $request -> address ?? "",
                'user_upd' => Auth::user() -> id
            ]);
            return redirect()->route('carMembers' , $request -> supplier_id ) -> with('success', __('main.updated'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarMember  $carMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = CarMember::find($id);
        if($member){
            $member -> delete();
            return redirect()->route('carMembers' , $member -> supplier_id) -> with('success', __('main.deleted'));

        }
    }
}

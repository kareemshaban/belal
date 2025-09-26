<?php

namespace App\Http\Controllers;

use App\Models\CarMember;
use Illuminate\Http\Request;
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

        echo json_encode($members);
        exit();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarMember  $carMember
     * @return \Illuminate\Http\Response
     */
    public function show(CarMember $carMember)
    {
        //
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
    public function update(Request $request, CarMember $carMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarMember  $carMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarMember $carMember)
    {
        //
    }
}

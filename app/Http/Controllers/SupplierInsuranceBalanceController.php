<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Items;
use App\Models\SupplierInsuranceBalance;
use App\Models\SupplierInsuranceItems;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierInsuranceBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $balances = DB::table('supplier_insurance_balances')
            ->join('clients', 'supplier_insurance_balances.supplier_id', '=', 'clients.id')
            ->select('supplier_insurance_balances.*', 'clients.name as supplier_name')
            ->get();
         $suppliers = Client::where('type', '<>' , 0)->get();
         $items = Items::all();
         return view('admin.Client.Insurance.index' , compact('balances' , 'suppliers' , 'items'));
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
                    'supplier_id' => 'required',
                    'balance' => 'required',
                ]
                , [
                    'type.required' => __('main.supplier_required'),
                    'name.required' => __('main.amount_required'),
                ]
            );
            SupplierInsuranceBalance::create([
                'supplier_id' => $request -> supplier_id,
                'date' => Carbon::parse($request -> date) ,
                'balance' => $request -> balance ,
                'notes' => $request -> notes ?? "",
                'state' => 0 ,
                'user_ins' => Auth::user() -> id,
                'user_upd' => 0,
            ]);
            $this -> storeItems($request);
            return redirect()->route('insuranceBalances' ,$request -> type) -> with('success', __('main.saved'));
        } else{
            return  $this -> update($request);
        }
    }

    public function storeItems(Request $request)
    {
    $details = SupplierInsuranceItems::where('insurance_id' , $request -> id) -> get();
        foreach($details as $detail){
            $detail -> delete();
        }

        for ($i = 0 ; $i < count($request -> item_id ) ; $i++){
            SupplierInsuranceItems::create([
                'insurance_id' => $$request -> id,
                'item_id' => $request -> item_id[$i],
                'quantity' => $request -> quantity[$i],
                'weight' => $request -> weight[$i] ,
                'user_ins' => Auth::user() -> id,
                'user_upd' => 0
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupplierInsuranceBalance  $supplierInsuranceBalance
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierInsuranceBalance $supplierInsuranceBalance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupplierInsuranceBalance  $supplierInsuranceBalance
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierInsuranceBalance $supplierInsuranceBalance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupplierInsuranceBalance  $supplierInsuranceBalance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $doc = SupplierInsuranceBalance::find($request -> id);
        if($doc){
           $doc -> update([
                'supplier_id' => $request -> supplier_id,
                'date' => Carbon::parse($request -> date) ,
                'balance' => $request -> balance ,
                'notes' => $request -> notes ?? "",
                'user_upd' => Auth::user() -> id
            ]);
            $this -> storeItems($request);
            return redirect()->route('insuranceBalances' ,$request -> type) -> with('success', __('main.updated'));


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupplierInsuranceBalance  $supplierInsuranceBalance
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplierInsuranceBalance $supplierInsuranceBalance)
    {
        //
    }
}

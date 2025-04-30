<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Item;
use App\Models\ItemQuantity;
use App\Models\MealsEnter;
use App\Models\MealsExit;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MealsEnterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = DB::table('meals_enters')
            -> join('items' , 'meals_enters.item_id' , '=' , 'items.id')
            -> join('clients' , 'meals_enters.client_id' , '=' , 'clients.id')
            -> select('meals_enters.*' , 'items.name as item_name' , 'items.code as item_code' ,
            'clients.name as client')->get();
        $items = Item::all();
        $clients = Client::all();
        return view('MealsEnter.index', compact('meals' , 'items' , 'clients'));
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
           $id = MealsEnter::create([
                'code' => $request -> code,
                'item_id' => $request -> item_id,
                'date' => Carbon::parse($request -> date),
                'quantity' => $request -> quantity,
                'outingQuantity' => 0 ,
                'client_id' => $request -> client_id,
                'enteringTax' => $request -> enteringTax,
                'notes' => $request -> notes ?? "",
                'user_ins' => Auth::user() -> id ,
                'user_upd' => 0
            ]) -> id;
            if($request -> enteringTax > 0){
             $this -> createPaymentDoc($request  , $id);

            }
             $this -> updateItemQnt($request -> quantity , 0 , $id);
            return redirect()->route('meals_enter')->with('success' ,  __('main.created'));

        } else {
            return  $this -> update($request);
        }
    }
    public function createPaymentDoc($request , $id){
        $payment = Payment::where('operation_id' , '=' , $id) -> first();
        if($payment){
            $payment -> delete();
        }
        Payment::create([
            'client_id'=> $request -> client_id,
            'date' => Carbon::parse($request -> date),
            'amount' => $request -> enteringTax,
            'notes' => 'رسوم دخول وجبة',
            'type' => 0 ,
            'operation_id' => $id,
            'paidAmount' => 0 ,
            'user_ins' => Auth::user() -> id ,
            'user_upd' => 0
        ]);
    }

    public function updateItemQnt($newQnt , $oldQnt , $item_id){
        $itemQnt = ItemQuantity::where('item_id' , '=' , $item_id) -> get() -> first() ;
        $qnt = $newQnt - $oldQnt ;
        if($itemQnt){
            //update
            $itemQnt -> update([
                'item_id' => $item_id,
                'quantity' => $itemQnt -> quantity + $qnt
            ]);
        } else {
            ItemQuantity::create([
                'item_id' => $item_id,
                'quantity' => $qnt
            ]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MealsEnter  $mealsEnter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enter = MealsEnter::find($id);
        echo json_encode($enter);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MealsEnter  $mealsEnter
     * @return \Illuminate\Http\Response
     */
    public function edit(MealsEnter $mealsEnter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MealsEnter  $mealsEnter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $enter = MealsEnter::find($request -> id);
        $oldQnt = $enter -> quantity;
        if($enter){
            $enter -> update([
                'code' => $request -> code,
                'item_id' => $request -> item_id,
                'date' => Carbon::parse($request -> date),
                'quantity' => $request -> quantity,
                'client_id' => $request -> client_id,
                'enteringTax' => $request -> enteringTax,
                'notes' => $request -> notes ?? "",
                'user_upd' => Auth::user() -> id
            ]);

            $this -> updateItemQnt($request -> quantity , $oldQnt , $enter -> id);
            return redirect()->route('meals_enter')->with('success' ,  __('main.created'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MealsEnter  $mealsEnter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exits = MealsExit::where('meal_id' , '=' , $id) -> get() ;
        if(count($exits) ==  0){
            $meal = MealsEnter::find($id);
            if($meal){
                $meal -> delete();
                $payment = Payment::where('type' , '=' , 0) -> where('operation_id' , '=' , $id) -> get() -> first();
                if($payment) {
                    $payment->delete();
                }

                $this -> updateItemQnt(0 , $meal -> quantity , $meal -> item_id);

            }
            return redirect()->route('meals_enter')->with('success' ,  __('main.deleted'));
        } else {
            return redirect()->route('meals_enter')->with('danger' ,  __('main.can_not_delete'));
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\WeaklyMilkMeal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class WeaklyMilkMealController extends Controller
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
        $meals = WeaklyMilkMeal::all();
        return view('admin.WeaklyMeals.index', compact('meals'));
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
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'code' => 'required|unique:weakly_milk_meals,code',
                ]
                , [
                    'code.required' => __('main.code_required'),
                    'code.unique'   => __('main.code_unique'),
                    'start_date.required' => __('main.start_date_required'),
                    'end_date.unique'   => __('main.end_date_required'),
                ]
            );

            $openMeals = WeaklyMilkMeal::where('state' , '=' , 0) -> get();
            if(count($openMeals) > 0){
                return redirect() -> route('weakly_meals') -> with('success' , __('main.can_not_open_new_weakly_meal'));


            } else {
                WeaklyMilkMeal::create([
                    'start_date' => Carbon::parse($request -> start_date),
                    'end_date' => Carbon::parse($request -> end_date),
                    'code' => $request -> code,
                    'state' => $request -> state,
                    'price_buffalo' => $request -> price_buffalo ?? 0,
                    'price_bovine' => $request -> price_bovine ?? 0,
                    'total_buffalo_weight' => $request -> total_buffalo_weight ?? 0,
                    'total_bovine_weight'  => $request -> total_bovine_weight ?? 0,
                    'total_money' => $request -> total_money ?? 0,
                    'number_of_daily_meals' => $request -> number_of_daily_meals ?? 0,
                    'notes' => $request -> notes ?? "",
                    'user_ins' => Auth::user() -> id,
                    'user_upd' => 0
                ]);

                return redirect() -> route('weakly_meals') -> with('success' , __('main.saved'));
            }

        } else {
            return  $this -> update($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WeaklyMilkMeal  $weaklyMilkMeal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = WeaklyMilkMeal::find($id);
        echo json_encode($meal);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WeaklyMilkMeal  $weaklyMilkMeal
     * @return \Illuminate\Http\Response
     */
    public function edit(WeaklyMilkMeal $weaklyMilkMeal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WeaklyMilkMeal  $weaklyMilkMeal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'start_date' => [
                'required'
            ],
            'end_date' => [
                'required'
            ],
            'code' => [
                'required',
                Rule::unique('weakly_milk_meals', 'code')->ignore($request -> id),
            ],
        ], [
            'code.required' => __('main.code_required'),
            'code.unique'   => __('main.code_unique'),
            'start_date.required' => __('main.start_date_required'),
            'end_date.unique'   => __('main.end_date_required'),
        ]);
        $meal = WeaklyMilkMeal::find($request -> id);
        if($meal){
            $meal -> update([
                'start_date' => Carbon::parse($request -> start_date),
                'end_date' => Carbon::parse($request -> end_date),
                'code' => $request -> code,
                'state' => $request -> state,
                'price_buffalo' => $request -> price_buffalo ?? 0,
                'price_bovine' => $request -> price_bovine ?? 0,
                'total_buffalo_weight' => $request -> total_buffalo_weight ?? 0,
                'total_bovine_weight'  => $request -> total_bovine_weight ?? 0,
                'total_money' => $request -> total_money ?? 0,
                'number_of_daily_meals' => $request -> number_of_daily_meals ?? 0,
                'notes' => $request -> notes ?? "",
                'user_upd' => Auth::user() -> id
            ]);
            return redirect() -> route('weakly_meals') -> with('success' , __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WeaklyMilkMeal  $weaklyMilkMeal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = WeaklyMilkMeal::find($id);
        if($meal){
            $meal -> delete();
            return redirect() -> route('weakly_meals') -> with('success' , __('main.deleted'));
        }
    }

    public function getCode()
    {
        $meals = WeaklyMilkMeal::where();
        $id = 0;
        if (count($meals) > 0) {
            $id = $meals[count($meals) - 1]->id + 1;
        } else {
            $id = 1;
        }
        $prefix = 'WM';
        $padded = $prefix . str_pad($id, 4, '0', STR_PAD_LEFT); // Result: "0001"    }
       echo json_encode($padded);
        exit();

    }

    public function carryingOver($id)
    {
        $meal = WeaklyMilkMeal::find($id);
        if($meal){
            if($meal -> state == 0){
                $response = [
                    'message' => '',
                    'meal' => $meal,
                ];
            } else {
                $response = [
                    'message' => __('main.meal_is_closed'),
                    'meal' => null,
                ];
            }

            echo json_encode($response);
            exit();
        } else {
            $response = [
                'message' => __('main.meal_not_found'),
                'meal' => null,
            ];
            echo json_encode($response);
            exit();
        }
    }
}

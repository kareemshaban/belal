<?php

namespace App\Http\Controllers;

use App\Models\CarMeal;
use App\Models\Client;
use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CarMealController extends Controller
{

  public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.CarsMeals.index');
    }

      public function getWeakMealsForCars($month , $year , $day)
    {

       $date = $day . '-' . $month . '-' . $year;
        $meals = DB::table('weakly_milk_meals')
            -> select(
                'weakly_milk_meals.id',
                'weakly_milk_meals.state',
                DB::raw('DAYNAME(weakly_milk_meals.start_date) as from_day_name_en'),
                DB::raw('DAYNAME(weakly_milk_meals.end_date) as to_day_name_en'),
                DB::raw('DATE(weakly_milk_meals.start_date) as start_date'),
                DB::raw('DATE(weakly_milk_meals.end_date) as end_date'),  )
            -> whereDate('start_date',  Carbon::parse($date))
            -> where('weakly_milk_meals.state' , '=' , '0')
            -> get() ;

        echo json_encode($meals);
        exit();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($wid)
    {
       $carMeal = CarMeal::where('weakly_meal_id', $wid)->first();
        return view('admin.CarsMeals.daily' , compact('carMeal', 'wid'));
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
     * @param  \App\Models\CarMeal  $carMeal
     * @return \Illuminate\Http\Response
     */
    public function show(CarMeal $carMeal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarMeal  $carMeal
     * @return \Illuminate\Http\Response
     */
    public function edit(CarMeal $carMeal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarMeal  $carMeal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarMeal $carMeal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarMeal  $carMeal
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarMeal $carMeal)
    {
        //
    }
}

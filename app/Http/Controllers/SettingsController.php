<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index(){
        $settings = Settings::all();
        if(count($settings )){
            $setting = $settings[0];
        } else {
            $setting = null ;
        }

        return view('Settings.index' , compact('setting'));
    }

    public function store(Request $request){
        if($request -> id == 0){
            Settings::create([
                'enteringTax'=> $request -> enteringTax ,
                'monthly_cooling_tax_per_box' => $request -> monthly_cooling_tax_per_box ,
                'user_ins' => Auth::user()-> id ,
                'user_upd'=> 0
            ]);
            return redirect()->route('settings')->with('success' ,  __('main.saved'));


        } else {
            $setting = Settings::find($request -> id);
            if($setting){
                $setting -> update([
                    'enteringTax'=> $request -> enteringTax ,
                    'monthly_cooling_tax_per_box' => $request -> monthly_cooling_tax_per_box ,
                    'user_upd'=> Auth::user()-> id
                ]);
            }
            return redirect()->route('settings')->with('success' ,  __('main.updated'));


        }
    }

    public function show(){
        $settings = Settings::all() -> first();
        echo  json_encode($settings);
        exit();
    }
}

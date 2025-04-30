<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

        Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee');
        Route::post('/employee-store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employee-store');
        Route::get('/employee-get/{id}', [App\Http\Controllers\EmployeeController::class, 'show'])->name('employee-get');
        Route::get('/employee-destroy/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employee-destroy');


        Route::get('/deductionAndBonse', [App\Http\Controllers\DeductionAndBonseController::class, 'index'])->name('deductionAndBonse');
        Route::post('/deductionAndBonse-store', [App\Http\Controllers\DeductionAndBonseController::class, 'store'])->name('deductionAndBonse-store');
        Route::get('/deductionAndBonse-get/{id}', [App\Http\Controllers\DeductionAndBonseController::class, 'show'])->name('deductionAndBonse-get');
        Route::get('/deductionAndBonse-destroy/{id}', [App\Http\Controllers\DeductionAndBonseController::class, 'destroy'])->name('deductionAndBonse-destroy');


        Route::get('/financialDeductionAndBonse', [App\Http\Controllers\RewardController::class, 'index'])->name('financialDeductionAndBonse');
        Route::post('/financialDeductionAndBonse-store', [App\Http\Controllers\RewardController::class, 'store'])->name('financialDeductionAndBonse-store');
        Route::get('/financialDeductionAndBonse-get/{id}', [App\Http\Controllers\RewardController::class, 'show'])->name('financialDeductionAndBonse-get');
        Route::get('/financialDeductionAndBonse-destroy/{id}', [App\Http\Controllers\RewardController::class, 'destroy'])->name('financialDeductionAndBonse-destroy');

        Route::get('/advances', [App\Http\Controllers\AdvanceController::class, 'index'])->name('advances');
        Route::post('/advances-store', [App\Http\Controllers\AdvanceController::class, 'store'])->name('advances-store');
        Route::get('/advances-get/{id}', [App\Http\Controllers\AdvanceController::class, 'show'])->name('advances-get');
        Route::get('/advances-destroy/{id}', [App\Http\Controllers\AdvanceController::class, 'destroy'])->name('advances-destroy');

        Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
        Route::post('/settings-store', [App\Http\Controllers\SettingsController::class, 'store'])->name('settings-store');

        Route::get('/monthClose', [App\Http\Controllers\MonthClosingController::class, 'index'])->name('monthClose');
        Route::post('/monthClose-store', [App\Http\Controllers\MonthClosingController::class, 'store'])->name('monthClose-store');
        Route::get('/monthClose-get/{id}', [App\Http\Controllers\MonthClosingController::class, 'show'])->name('monthClose-get');
        Route::get('/monthClose-destroy/{id}', [App\Http\Controllers\MonthClosingController::class, 'destroy'])->name('monthClose-destroy');



        Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients');
        Route::post('/client-store', [App\Http\Controllers\ClientController::class, 'store'])->name('client-store');
        Route::get('/client-get/{id}', [App\Http\Controllers\ClientController::class, 'show'])->name('client-get');
        Route::get('/client-destroy/{id}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('client-destroy');

        Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items');
        Route::post('/item-store', [App\Http\Controllers\ItemController::class, 'store'])->name('item-store');
        Route::get('/item-get/{id}', [App\Http\Controllers\ItemController::class, 'show'])->name('item-get');
        Route::get('/item-destroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item-destroy');

        Route::get('/meals_enter', [App\Http\Controllers\MealsEnterController::class, 'index'])->name('meals_enter');
        Route::post('/meals_enter-store', [App\Http\Controllers\MealsEnterController::class, 'store'])->name('meals_enter-store');
        Route::get('/meals_enter-get/{id}', [App\Http\Controllers\MealsEnterController::class, 'show'])->name('meals_enter-get');
        Route::get('/meals_enter-destroy/{id}', [App\Http\Controllers\MealsEnterController::class, 'destroy'])->name('meals_enter-destroy');

        Route::get('/meals_exit', [App\Http\Controllers\MealsExitController::class, 'index'])->name('meals_exit');
        Route::post('/meals_exit-store', [App\Http\Controllers\MealsExitController::class, 'store'])->name('meals_exit-store');
        Route::get('/meals_exit-get/{id}', [App\Http\Controllers\MealsExitController::class, 'show'])->name('meals_exit-get');
        Route::get('/meals_exit-destroy/{id}', [App\Http\Controllers\MealsExitController::class, 'destroy'])->name('meals_exit-destroy');
        Route::get('/item_meals_exit/{id}', [App\Http\Controllers\MealsExitController::class, 'item_meals_exit'])->name('item_meals_exit');
        Route::get('/get_exit_meal_count/{id}', [App\Http\Controllers\MealsExitController::class, 'get_exit_meal_count'])->name('get_exit_meal_count');
        Route::get('/get_exit_meal_item/{id}', [App\Http\Controllers\MealsExitController::class, 'get_exit_meal_item'])->name('get_exit_meal_item');

        Route::get('/meals_report', [App\Http\Controllers\MealsExitController::class, 'meals_report'])->name('meals_report');
        Route::get('/client_Account', [App\Http\Controllers\MealsExitController::class, 'client_Account'])->name('client_Account');



        Route::get('/item_meals/{id}', [App\Http\Controllers\ItemController::class, 'meals'])->name('meals');

            Route::get('/settings_get', [App\Http\Controllers\SettingsController::class, 'show'])->name('settings_get');


        Auth::routes();
    }
);




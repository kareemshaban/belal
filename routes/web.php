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

        Route::get('/stores', [App\Http\Controllers\StoreController::class, 'index'])->name('stores');
        Route::get('/stores-show/{id}', [App\Http\Controllers\StoreController::class, 'show'])->name('stores-show');
        Route::post('/stores-store', [App\Http\Controllers\StoreController::class, 'store'])->name('stores-store');
        Route::get('/stores-delete/{id}', [App\Http\Controllers\StoreController::class, 'destroy'])->name('stores-delete');

        Route::get('/safes', [App\Http\Controllers\SafeController::class, 'index'])->name('safes');
        Route::get('/safes-show/{id}', [App\Http\Controllers\SafeController::class, 'show'])->name('safes-show');
        Route::post('/safes-store', [App\Http\Controllers\SafeController::class, 'store'])->name('safes-store');
        Route::get('/safes-delete/{id}', [App\Http\Controllers\SafeController::class, 'destroy'])->name('safes-delete');

        Route::get('/expenses_types', [App\Http\Controllers\RecipitTypeController::class, 'index'])->name('expenses_types');
        Route::get('/expenses_types-show/{id}', [App\Http\Controllers\RecipitTypeController::class, 'show'])->name('expenses_types-show');
        Route::post('/expenses_types-store', [App\Http\Controllers\RecipitTypeController::class, 'store'])->name('expenses_types-store');
        Route::get('/expenses_types-delete/{id}', [App\Http\Controllers\RecipitTypeController::class, 'destroy'])->name('expenses_types-delete');


        Route::get('/suppliers', [App\Http\Controllers\ClientController::class, 'index'])->name('suppliers');
        Route::get('/suppliers-show/{id}', [App\Http\Controllers\ClientController::class, 'show'])->name('suppliers-show');
        Route::post('/suppliers-store', [App\Http\Controllers\ClientController::class, 'store'])->name('suppliers-store');
        Route::get('/suppliers-delete/{id}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('suppliers-delete');

        Route::get('/items', [App\Http\Controllers\ItemsController::class, 'index'])->name('items');
        Route::get('/items-show/{id}', [App\Http\Controllers\ItemsController::class, 'show'])->name('items-show');
        Route::post('/items-store', [App\Http\Controllers\ItemsController::class, 'store'])->name('items-store');
        Route::get('/items-delete/{id}', [App\Http\Controllers\ItemsController::class, 'destroy'])->name('items-delete');

        Route::get('/cars', [App\Http\Controllers\CarsController::class, 'index'])->name('cars');
        Route::get('/cars-show/{id}', [App\Http\Controllers\CarsController::class, 'show'])->name('cars-show');
        Route::post('/cars-store', [App\Http\Controllers\CarsController::class, 'store'])->name('cars-store');
        Route::get('/cars-delete/{id}', [App\Http\Controllers\CarsController::class, 'destroy'])->name('cars-delete');

        Route::get('/weakly_meals', [App\Http\Controllers\WeaklyMilkMealController::class, 'index'])->name('weakly_meals');
        Route::get('/weakly_meals-show/{id}', [App\Http\Controllers\WeaklyMilkMealController::class, 'show'])->name('weakly_meals-show');
        Route::post('/weakly_meals-store', [App\Http\Controllers\WeaklyMilkMealController::class, 'store'])->name('weakly_meals-store');
        Route::get('/weakly_meals-delete/{id}', [App\Http\Controllers\WeaklyMilkMealController::class, 'destroy'])->name('weakly_meals-delete');
        Route::get('/weakly_meals-code', [App\Http\Controllers\WeaklyMilkMealController::class, 'getCode'])->name('weakly_meals-code');
        Route::get('/weakly_meals-carryingOver/{id}', [App\Http\Controllers\WeaklyMilkMealController::class, 'carryingOver'])->name('weakly_meals-carryingOver');


        Route::get('/daily_meals', [App\Http\Controllers\DailyMilkMealController::class, 'index'])->name('daily_meals');
        Route::get('/daily_meals-show/{id}', [App\Http\Controllers\DailyMilkMealController::class, 'show'])->name('daily_meals-show');
        Route::post('/daily_meals-store', [App\Http\Controllers\DailyMilkMealController::class, 'store'])->name('daily_meals-store');
        Route::get('/daily_meals-delete/{id}', [App\Http\Controllers\DailyMilkMealController::class, 'destroy'])->name('daily_meals-delete');
        Route::get('/daily_meals-code/{id}', [App\Http\Controllers\DailyMilkMealController::class, 'getCode'])->name('daily_meals-code');
        Route::get('/bouns-check/{type}', [App\Http\Controllers\DailyMilkMealController::class, 'bounsCheck'])->name('bouns-check');


        Route::get('/cheese-meals', [App\Http\Controllers\CheeseMealController::class, 'index'])->name('cheese-meals');




        Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
        Route::post('/store-user', [App\Http\Controllers\HomeController::class, 'storeUser'])->name('store-user');
        Route::get('/getUser/{id}', [App\Http\Controllers\HomeController::class, 'showUser'])->name('getUser');
        Route::get('/deleteUser/{id}', [App\Http\Controllers\HomeController::class, 'destroyUser'])->name('deleteUser');
        Route::get('/getUserProfile/{id}', [App\Http\Controllers\HomeController::class, 'getUserProfile'])->name('getUserProfile');
        Route::post('/reset-password', [App\Http\Controllers\HomeController::class, 'resetPassword'])->name('reset-password');
        Route::post('/update-supplier', [App\Http\Controllers\HomeController::class, 'updateSupplier'])->name('update-supplier');



        Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');
        Route::post('/store-role', [App\Http\Controllers\RoleController::class, 'store'])->name('store-role');
        Route::get('/getRole/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('getRole');
        Route::get('/deleteRole/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('deleteRole');


        Route::get('/auth', [App\Http\Controllers\AuthenticationController::class, 'index'])->name('auth');
        Route::post('/store-auth', [App\Http\Controllers\AuthenticationController::class, 'store'])->name('store-auth');
        Route::get('/getAuth/{id}', [App\Http\Controllers\AuthenticationController::class, 'show'])->name('getAuth');
        Route::get('/deleteAuth/{id}', [App\Http\Controllers\AuthenticationController::class, 'destroy'])->name('deleteAuth');
        Route::get('/auth-create', [App\Http\Controllers\AuthenticationController::class, 'create'])->name('authCreate');
        Route::get('/getRoleAuthForms/{id}', [App\Http\Controllers\AuthenticationController::class, 'getRoleAuthForms'])->name('getRoleAuthForms');


        Auth::routes();
    }
);




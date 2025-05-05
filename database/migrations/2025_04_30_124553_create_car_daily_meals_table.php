<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarDailyMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_daily_meals', function (Blueprint $table) {
            $table->id();
            $table -> string("code");
            $table -> integer('car_id');
            $table -> integer("weakly_meal_id");
            $table -> integer("type");
            $table -> timestamp("date") -> useCurrent();
            $table -> integer("supplier_id");
            $table -> decimal("buffalo_weight");
            $table -> decimal("bovine_weight");
            $table -> text("notes");
            $table -> decimal('buffalo_weight_difference') ;
            $table -> decimal('bovine_weight_difference') ;
            $table -> integer('user_ins') -> default(0);
            $table -> integer('user_upd') -> default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_daily_meals');
    }
}

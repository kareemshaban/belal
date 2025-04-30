<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheeseMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheese_meals', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('daily_milk_meal');
            $table->decimal('milk_weight');
            $table->integer('quantity');
            $table->decimal('weight');
            $table->decimal('average_weight_per_milk_litter');
            $table->decimal('average_productivity_per_cheese_disk');
            $table->decimal('productivity');
            $table->decimal('cost_per_cheese_kilo');
            $table->text('notes');
            $table->integer('user_ins') -> default(0);
            $table->integer('user_upd') -> default(0);
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
        Schema::dropIfExists('cheese_meals');
    }
}

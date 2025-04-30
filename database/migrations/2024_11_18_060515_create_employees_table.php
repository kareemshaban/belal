<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table -> integer('tag') ;
            $table -> string('name') ;
            $table -> string('phone') ;
            $table -> text('address') ;
            $table -> decimal('salary') ;
            $table -> integer('workHoursCount') ;
            $table -> integer('workDaysCount') ;
            $table -> integer('offWeaklyDaysCount') ;
            $table -> integer('user_ins');
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
        Schema::dropIfExists('employees');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyattendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailyattendances', function (Blueprint $table) {
            $table->id();
            $table->String('userid');
            $table->date('date');
            $table->time('checkin');
            $table->time('checkout');
            $table->String('lunchtime');      
            $table->String('workinghour');
            $table->String('latetime');
            $table->String('ottime');
            $table->String('leaveday');
            $table->String('halfdayleave');   
            $table->String('workfromhome');
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
        Schema::dropIfExists('dailyattendances');
    }
}

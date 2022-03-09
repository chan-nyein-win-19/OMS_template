<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowanceSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowance_salaries', function (Blueprint $table) {
            $table->id();
            $table->double('pbc');
            $table->double('skill');
            $table->double('manager');
            $table->double('transition');
            $table->double('totalkyat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allowance_salaries');
    }
}

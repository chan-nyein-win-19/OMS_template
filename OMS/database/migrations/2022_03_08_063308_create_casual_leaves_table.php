<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasualLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casual_leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeId');
            $table->integer('payLeave');
            $table->integer('usedLeave');
            $table->integer('leftLeave');
            $table->integer('leaveWithoutPay');
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
        Schema::dropIfExists('casual_leaves');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicsalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basicsalaries', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->integer('bandid');
            $table->integer('casualid');
            $table->integer('workingdayid');
            $table->double('late_over_deduction');
            $table->double('incometax');
            $table->double('staff_loan_return');
            $table->double('leave_over_deduction');
            $table->float('OThr');
            $table->double('OTrate');
            $table->double('OT');
            $table->double('SSC');
            $table->integer('companytrip');
            $table->double('totalkyat');
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
        Schema::dropIfExists('basicsalaries');
    }
}

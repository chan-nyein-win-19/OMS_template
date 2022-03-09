<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->integer('bandId');
            $table->integer('casualId');
            $table->integer('workingdayId');
            $table->double('lateOverDeduction');
            $table->double('incomeTax');
            $table->double('staffLoanReturn');
            $table->double('leaveOverDeduction');
            $table->float('OTHr');
            $table->double('OTRate');
            $table->double('Overtime');
            $table->double('SSC');
            $table->integer('companyTrip');
            $table->double('totalBasicSalary');
            $table->double('PBC');
            $table->double('skill');
            $table->double('manager');
            $table->double('transition');
            $table->double('totalAllowance');
            $table->double('subtotalSalary');
            $table->double('continuedYear');
            $table->double('attendancePerfect');
            $table->double('homeAllowance');
            $table->double('bonus');
            $table->double('businessTripAllowance');
            $table->double('hometownVisitAllowance');
            $table->double('manualAdjust');
            $table->string('manualReason');
            $table->double('subtotal');
            $table->double('netPayment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_payments');
    }
}

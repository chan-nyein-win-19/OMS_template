<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_history', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('employeeid');
            $table->string('role');
            $table->string('NRC');
            $table->string('joinDate');
            $table->integer('gicmExp');
            $table->string('address');
            $table->string('phNo');
            $table->string('education');
            $table->string('DOB');
            $table->string('batch');
            $table->string('gender');
            $table->string('office');
            $table->integer('workExp');
            $table->string('marriageStatus');
            $table->integer('travelFees');
            $table->integer('bandId');
            $table->integer('PBCId')->nullable();
            $table->integer('educationId');
            $table->integer('japaneseId');
            $table->integer('englishId');
            $table->integer('casualLeaveId');
            $table->integer('ITSkillId');
            $table->integer('accessUserId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_history');
    }
}

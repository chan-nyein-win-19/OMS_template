<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePbcChangesHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbc_changes_histories', function (Blueprint $table) {
            $table->id();
            $table->String('employeeName');
            $table->string('pbcNo');
            $table->double('oldAllowance');
            $table->double('newAllowance');
            $table->integer('year');
            $table->String('status');
            $table->integer('pbcid');
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
        Schema::dropIfExists('pbc_changes_histories');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcs', function (Blueprint $table) {
            $table->id();
            $table->string('itemcode');
            $table->string('cpu');
            $table->string('ram');
            $table->string('storage');
            $table->string('model');
            $table->string('condition');
            $table->double('currentprice');
            $table->string('status');
            $table->integer('purchaseid');
            $table->integer('categoryid');
            $table->integer('subcategoryid');
            $table->integer('brandid');
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
        Schema::dropIfExists('pcs');
    }
}

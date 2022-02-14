<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:OMS/database/migrations/2022_02_03_080005_create_others_table.php
        Schema::create('others', function (Blueprint $table) {
            $table->id();
            $table->string('itemcode');
=======
        Schema::create('asset_details', function (Blueprint $table) {
            
            $table->id();
            $table->integer('itemCode');
>>>>>>> otherasset:OMS/database/migrations/2022_02_01_105454_create_asset_details_table.php
            $table->string('condition');
            $table->double('currentprice');
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
        Schema::dropIfExists('others');
    }
}

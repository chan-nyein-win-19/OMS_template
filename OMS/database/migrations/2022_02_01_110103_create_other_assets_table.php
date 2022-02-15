<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_assets', function (Blueprint $table) {
            $table->id();
            $table->double('currentprice');
            $table->integer('quantity');
            $table->integer('totalprice');
            $table->integer('purchaseid');
            $table->integer('categoryid');
            $table->integer('subcategoryid');
            $table->integer('brandid');
            $table->string('condition');
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
        Schema::dropIfExists('other_assets');
    }
}

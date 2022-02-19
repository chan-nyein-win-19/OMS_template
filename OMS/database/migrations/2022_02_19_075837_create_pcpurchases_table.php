<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcpurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcpurchases', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('cpu');
            $table->string('ram');
            $table->string('storage');
            $table->string('model');
            $table->string('condition');
            $table->integer('quantity')->unsigned();
            $table->double('totalprice')->unsigned();
            $table->double('priceperunit')->unsigned();
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
        Schema::dropIfExists('pcpurchases');
    }
}

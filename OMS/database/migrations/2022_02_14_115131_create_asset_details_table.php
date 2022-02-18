<?php



use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;



class CreateAssetDetailsTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {
        Schema::create('asset_details', function (Blueprint $table) {
            $table->id();
            $table->string('itemCode');
            $table->string('condition');
            $table->double('currentPrice');
            $table->integer('purchaseId');
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
        Schema::dropIfExists('asset_details');
    }

}
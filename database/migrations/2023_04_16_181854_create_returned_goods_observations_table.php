<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnedGoodsObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returned_goods_observations', function (Blueprint $table) {
            $table->increments('id');            
            $table->date("date");
            $table->text("observation");
            
            $table->unsignedInteger("returned_good_id");
            $table->foreign("returned_good_id")->references("id")->on("returned_goods");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('returned_goods_observations');
    }
}

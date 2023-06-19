<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedGoodsObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_goods_observations', function (Blueprint $table) {
            $table->increments('id');
            $table->date("date");
            $table->text("observation");
            
            $table->unsignedInteger("assigned_good_id");
            $table->foreign("assigned_good_id")->references("id")->on("assigned_goods");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned_goods_observations');
    }
}

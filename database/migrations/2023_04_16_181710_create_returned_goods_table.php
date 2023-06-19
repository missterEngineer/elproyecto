<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnedGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returned_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->date("date");
            $table->integer("uds");
            
            $table->unsignedInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");

           
            
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
        Schema::dropIfExists('returned_goods');
    }
}

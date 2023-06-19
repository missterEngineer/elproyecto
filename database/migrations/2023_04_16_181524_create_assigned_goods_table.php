<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->date("date");
            $table->unsignedInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->boolean("active")->default(1);
            $table->integer("uds");
            
            $table->unsignedInteger("staff_id");
            $table->foreign("staff_id")->references("id")->on("staffs");
            
            $table->unsignedInteger("goods_id");
            $table->foreign("goods_id")->references("id")->on("goods");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned_goods');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("brand");
            $table->string("cod");
            $table->text("description");
            $table->integer("uds");
            $table->integer("uds_available");
            $table->date("date");
            $table->boolean("active")->default(1);
            $table->unsignedInteger("state_id");
            $table->foreign("state_id")->references("id")->on("states");
            $table->unsignedInteger("category_id");
            $table->foreign("category_id")->references("id")->on("categories");
            $table->unsignedInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}

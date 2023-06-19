<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string("names");
            $table->string("surnames");
            $table->integer("ci");
            $table->string("username");
            $table->string("password");
            $table->rememberToken();
            $table->boolean("active")->default(1);
            $table->unsignedInteger("profile_id");
            $table->foreign("profile_id")->references("id")->on("profiles");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

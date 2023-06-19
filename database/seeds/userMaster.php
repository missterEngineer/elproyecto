<?php

use Illuminate\Database\Seeder;

class userMaster extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table("users")->insert([
            "id" => 0,
            "names" => "Usuario",
            "surnames" => "Master",
            "ci" => 0,
            "username" => "userMaster",
            "password" => bcrypt("claveMaster"),
            "profile_id" => 3,
            "active" => 1
        ]);
        
    }
}

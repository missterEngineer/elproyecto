<?php

use Illuminate\Database\Seeder;

class profiles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table("profiles")->insert([

            ["id" => 1, "name" => "Regular"],
            ["id" => 2, "name" => "Admin"],
            ["id" => 3, "name" => "Master"]

        ]);
        
    }
}

<?php

use Illuminate\Database\Seeder;

class states extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table("states")->insert([

            ["id" => 1, "name" => "LIBRE"],
            ["id" => 2, "name" => "ASIGNADO"],
            ["id" => 3, "name" => "NO DISPONIBLE"]

        ]);

    }
}

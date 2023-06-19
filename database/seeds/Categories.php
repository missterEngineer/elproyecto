<?php

use Illuminate\Database\Seeder;

class Categories extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table("categories")->insert([

            ["id" => 1, "name" => "HERRAMIENTAS"],
            ["id" => 2, "name" => "UTILES DE OFICINA"],
            ["id" => 3, "name" => "PERIFERICOS DE PC"],
            ["id" => 4, "name" => "LAPTOPS Y ACCESORIOS"],
            ["id" => 5, "name" => "IMPRESION"],
            ["id" => 6, "name" => "COMPONENTES DE PC"],
            ["id" => 7, "name" => "PERIFERICOS DE PC"],
            ["id" => 8, "name" => "CABLES Y HUBS USB"],
            ["id" => 9, "name" => "ALMACENAMIENTO"],
            ["id" => 10, "name" => "CONECTIVIDAD Y REDES"],
            ["id" => 11, "name" => "CAJAS Y ORGANIZADORES"],


        ]);


    }
}

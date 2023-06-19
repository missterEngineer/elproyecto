<?php

use Illuminate\Database\Seeder;

class departaments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table("departments")->insert([

            ["id" => 1, "name" => "DIRECCION DEL DESPACHO"],
            ["id" => 2, "name" => "UNIDAD DE AUDITORIA INTERNA"],
            ["id" => 3, "name" => "OFICINA DE ATENCION AL CIUDADANO"],
            ["id" => 4, "name" => "DIRECCION DE COMUNICACION Y RELACIONES PUBLICAS"],
            ["id" => 5, "name" => "DIRECCION GENERAL"],
            ["id" => 6, "name" => "DIRECCION DE ADMINISTRACION Y FINANZAS"],
            ["id" => 7, "name" => "DIRECCION DE CONSULTORIA JURIDICA"],
            ["id" => 8, "name" => "DIRECCION DE PLANIFICACION, PRESUPUESTO Y CONTROL DE GESTION"],
            ["id" => 9, "name" => "DIRECCION DE TALENTO HUMANO"],
            ["id" => 10, "name" => "DIRECCION DE TECNOLOGIA DE INFORMACION Y COMUNICACIONES"],
            ["id" => 11, "name" => "DIRECCION DE CONTROL DE LA ADMINISTRACION CENTRAL Y OTRO PODER"],
            ["id" => 12, "name" => "DIRECCION DE CONTROL DE LA ADMINISTRACION DESCENTRALIZADA"],
            ["id" => 13, "name" => "DIRECCION DE DETERMINACION DE RESPONSABILIDAD ADMINISTRATIVA"]


        ]);

    }
}

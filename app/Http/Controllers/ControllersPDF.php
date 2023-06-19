<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllersPDF extends Controller{

    public function createPDFLog(Request $request){

        
        $log = DB::table("log")
            ->select("log.*", "users.ci", "users.username")
            ->join("users", "users.id", "=", "log.user_id")
            ->orderBy('log.date', 'ASC')
            ->get();

            $pdf = \PDF::loadview('pdfs/pdf-auditoria', compact('log'));
            return $pdf->setPaper('letter', 'landscape')->stream('pdfs/pdf-auditoria');

    }

    public function createPDFUsers(Request $request){

        $users = DB::table("users")->select("users.id", "users.names", "users.surnames", "users.ci", "users.username", "profiles.name")
        ->join("profiles", "profiles.id", "=", "users.profile_id")
        ->where("users.profile_id", "=", "1")
        ->where("users.active", "=", 1)
        ->get();

        $pdf = \PDF::loadview('pdfs/pdf-users', compact('users'));
        return $pdf->setPaper('letter', 'landscape')->stream('pdfs/pdf-users');


    }

    public function createPDFArticulos(Request $request){

        $articulos = DB::table("goods")
                    ->select("goods.*", "states.name as state", "categories.name as Category")
                    ->join("states", "states.id", "=", "goods.state_id")
                    ->join("categories", "categories.id", "=", "goods.category_id")
                    ->where("goods.active", "=", 1)
                    ->where("goods.state_id", "=", 1)
                    ->orderBy('categories.name', 'ASC')
                    ->get();

        $pdf = \PDF::loadview('pdfs/pdf-articulos', compact('articulos'));
        return $pdf->setPaper('letter', 'landscape')->stream('pdfs/pdf-articulos');

    }

    public function createPDFArticulosEntregados(Request $request){

        $articulos = DB::table("assigned_goods")
                    ->select("assigned_goods.*", "staffs.ci",
                            "staffs.names as funcionario", 
                            "staffs.position", "staffs.surnames", "departments.name as departments", 
                            "goods.name as goods", "goods.brand", "goods.cod", 
                            "goods.description", "categories.name as categorie")
                    ->join("staffs", "staffs.id", "=", "assigned_goods.staff_id")
                    ->join("departments", "departments.id", "=", "staffs.department_id")
                    ->join("goods", "goods.id", "=", "assigned_goods.goods_id")
                    ->join("categories", "categories.id", "=", "goods.category_id")
                    ->where("assigned_goods.active", "=", 1)
                    ->orderBy('categories.name', 'DESC')
                    ->get();

        $pdf = \PDF::loadview('pdfs/pdf-articulosEntregados', compact('articulos'));
        return $pdf->setPaper('letter', 'landscape')->stream('pdfs/pdf-articulosEntregados');

    }


    public function createPDFArticuloHistoria(Request $request){



        $idParam = $request->query("id");

        $obj =  DB::table("goods")
                ->select("goods.*",  "categories.name as Category")
                ->join("categories", "categories.id", "=", "goods.category_id")
                ->where("goods.id", "=", $idParam)
                ->get();

        $asigne = DB::table("assigned_goods")
                ->select("assigned_goods.*", "staffs.ci", "staffs.names as funcionario",
                        "departments.name as departments",
                        "assigned_goods_observations.observation as assigne_observations",
                        "returned_goods_observations.observation as returne_observation",
                        "returned_goods.date as returne_date")
                ->join("staffs", "staffs.id", "=", "assigned_goods.staff_id")
                ->join("departments", "departments.id", "=", "staffs.department_id")
                ->join("assigned_goods_observations", "assigned_goods_observations.assigned_good_id", "=", "assigned_goods.id")
                ->leftjoin("returned_goods", "returned_goods.assigned_good_id", "=", "assigned_goods.id")
                ->leftjoin("returned_goods_observations", "returned_goods_observations.returned_good_id", "=", "returned_goods.id")
                ->where("assigned_goods.goods_id", "=", $idParam)
                ->orderBy('assigned_goods.date', 'ASC')
                ->get();

                $newObj = $obj[0];

        $pdf = \PDF::loadview('pdfs/pdf-articulosHistoria', compact('newObj', 'asigne'));
        return $pdf->setPaper('letter', 'landscape')->stream('pdfs/pdf-articulosHistoria');

    }

}
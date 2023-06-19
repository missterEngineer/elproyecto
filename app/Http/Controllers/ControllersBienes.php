<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Goods;


class ControllersBienes extends Controller{

    public function get(){
        return DB::table("goods")
            ->select("goods.*", "states.name as state", "categories.name as Category")
            ->join("states", "states.id", "=", "goods.state_id")
            ->join("categories", "categories.id", "=", "goods.category_id")
            ->where("goods.active", "=", 1)
            ->where("goods.state_id", "=", 1)
            ->orderBy('categories.name', 'ASC')
            ->get();
    }

    public function getHistoryArticle(Request $request){


        $idParam = $request->query("id");
        // $obj = Goods::findOrFail(1);

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


                    return ["obj" => $obj, "histrory" => $asigne];
    }

    public function getSelect(Request $request){

        $typeSelectFilter = $request->idSelect;
    
      
        if($typeSelectFilter == 1){
            return DB::table("goods")->select("goods.*", "states.name as state", "categories.name as Category")->join("states", "states.id", "=", "goods.state_id")->join("categories", "categories.id", "=", "goods.category_id")->where("goods.active", "=", 1)->where("goods.cod", "=", "$request->cod")->orderBy('goods.category_id', 'DESC')->get();
        }

        if($typeSelectFilter == 2){
            return DB::table("goods")->select("goods.*", "states.name as state", "categories.name as Category")->join("states", "states.id", "=", "goods.state_id")->join("categories", "categories.id", "=", "goods.category_id")->where("goods.active", "=", 1)->where("goods.category_id", "=", $request->categoria)->orderBy('goods.category_id', 'DESC')->get();
        }

        if($typeSelectFilter == 3){
            return DB::table("goods")->select("goods.*", "states.name as state", "categories.name as Category")->join("states", "states.id", "=", "goods.state_id")->join("categories", "categories.id", "=", "goods.category_id")->where("goods.active", "=", 1)->where("goods.state_id", "=", $request->state)->orderBy('goods.category_id', 'DESC')->get();
        }

        // if($typeSelectFilter == 4){
        //     return DB::table("goods")->select("goods.*", "states.name as state", "categories.name as Category")->join("states", "states.id", "=", "goods.state_id")->join("categories", "categories.id", "=", "goods.category_id")->where("goods.active", "=", 1)->where("goods.state_id", "=", $request->state)->orderBy('goods.category_id', 'ASC')->get();
        // }


    }
    
    public function create(Request $request){


        $validateCod = DB::table('goods')->where('cod', "$request->codigo")->get();

        if(count($validateCod) != 0){
            return response()->json(['msg' => 'El codigo ya esta registrado'], 402);
        }

        $bienes = new Goods();
        $bienes->name = $request->nombre;
        $bienes->brand = $request->marca;
        $bienes->description = $request->descripcion;
        $bienes->cod = $request->codigo;
        $bienes->uds = $request->uds;
        $bienes->uds_available = $request->uds;
        $bienes->state_id = 1;
        $bienes->category_id = $request->categoria;
        $bienes->date = date("y-m-d");
        $bienes->user_id = $request->user;
        $bienes->save();

        return $bienes;
    }

    public function update(Request $request){

        $bienes = Goods::findOrFail($request->id);
        $bienes->name = $request->nombre;
        $bienes->brand = $request->marca;
        $bienes->description = $request->descripcion;
        $bienes->category_id = $request->categoria;
        $bienes->save();

    }

    public function destroy(Request $request){
        $obj = Goods::findOrFail($request->id);
        $obj->active = 0;
        $obj->save();
        return $obj;
    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Assigned_goods;
use App\Goods;
use App\Staffs;
use App\Returned_goods;
use App\Assigned_goods_observations;
use App\Returned_goods_obserbation;
use App\Log;


class ControllerAssigned_goods extends Controller{

    public function get(){
        return Assigned_goods::all();
    }


    public function getAssignedGoods(){
        return DB::table("assigned_goods")
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
    }


    public function getFilterAssigneGoods(Request $request){

        $typeSelectFilter = $request->idSelect;

        if($typeSelectFilter == 1){

            return DB::table("assigned_goods")
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
            ->where("goods.cod", "=", "$request->cod")
            ->orderBy('categories.name', 'DESC')
            ->get();
            

        }

        if($typeSelectFilter == 2){

            return DB::table("assigned_goods")
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
            ->where("goods.category_id", "=", "$request->categoria")
            ->orderBy('categories.name', 'DESC')
            ->get();
        }

        if($typeSelectFilter == 3){

            return DB::table("assigned_goods")
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
            ->where("staffs.department_id", "=", "$request->direccion")
            ->orderBy('categories.name', 'DESC')
            ->get();
        }

        if($typeSelectFilter == 4){

            return DB::table("assigned_goods")
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
            ->where("staffs.ci", "=", "$request->ci")
            ->orderBy('categories.name', 'DESC')
            ->get();
        }

    }
    
    public function asigne(Request $request){

        
        $staffsControll = Staffs::where("ci", $request->ci)->get();

        $staffs;

        if(count($staffsControll) < 1){

            $staffs = new Staffs();
            $staffs->ci = $request->ci;
            $staffs->names = $request->name;
            $staffs->surnames = $request->surname;
            $staffs->position = $request->position;
            $staffs->department_id = $request->direccion;
            $staffs->save();

        }

        if(count($staffsControll) > 0){
            $staffs = $staffsControll[0];
        }

        $bienes = Goods::findOrFail($request->idObj);

        // if($bienes->state_id != 1){
        //     return response()->json(['msg' => 'El articulo ya no esta disponible, por favor vuelva a recargar la página'], 402);
        // }

        if($bienes->uds_available < $request->uds){
            return response()->json(['msg' => 'El articulo no cuenta con suficientes unidades disponibles'], 402);
        }


        $asig = new Assigned_goods();
        $asig->goods_id = $request->idObj;
        $asig->staff_id = $staffs->id;
        $asig->uds = $request->uds;
        $asig->date = date("y-m-d");
        $asig->active = 1;
        $asig->user_id = $request->idUsuario;
        $asig->save();


        $bienes->uds_available = abs($bienes->uds_available - $request->uds);
        $bienes->save();


        
        if($request->observacion != "null"){

            $observacion = new Assigned_goods_observations();
            $observacion->date = date("y-m-d");
            $observacion->observation = $request->observacion;
            $observacion->assigned_good_id = $asig->id;
            $observacion->save();

        }

        $log = new Log();
        $log->action = "El articulo ($bienes->name) ha sido asignado al funcionario ($staffs->names - $staffs->ci)";
        $log->date = date("y-m-d");
        $log->user_id = $request->idUsuario;
        $log->save();

        return $asig;        
    }

    public function reEntry(Request $request){

        $bienes = Goods::findOrFail($request->idObj);
        $asigne = Assigned_goods::findOrFail($request->idObjAsig);


        // if($bienes->state_id != 2){
        //     return response()->json(['msg' => 'El articulo ya no esta disponible, por favor vuelva a recargar la página'], 402);
        // }

        if($asigne->uds < $request->uds){
            return response()->json(['msg' => 'Unidades del articulo invalida'], 402);
        }

        $returneBienes = new Returned_goods();
        $returneBienes->user_id = $request->idUsuario;
        $returneBienes->assigned_good_id = $request->idObjAsig;
        $returneBienes->uds = $request->uds;
        $returneBienes->date = date("y-m-d");
        $returneBienes->save();

        $asigne->active = 0;
        $asigne->save();

        $bienes->state_id = 1;
        $bienes->uds_available = $bienes->uds_available + $request->uds;
        $bienes->save();

        $returneBienesObservations = new Returned_goods_obserbation();
        $returneBienesObservations->observation = $request->observation;
        $returneBienesObservations->date = date("y-m-d");
        $returneBienesObservations->returned_good_id = $returneBienes->id;
        $returneBienesObservations->save();


        
        $log = new Log();
        $log->action = "El articulo ($bienes->name) ha sido regresado ()";
        $log->date = date("y-m-d");
        $log->user_id = $request->idUsuario;
        $log->save();

        return $returneBienes;
        
    }
    
}

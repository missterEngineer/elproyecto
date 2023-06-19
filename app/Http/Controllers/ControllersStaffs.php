<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Staffs;


class ControllersStaffs extends Controller{
    
    public function get(){
        return Staffs::all();
    }

    public function getOne(Request $request){

        $ciParam = $request->query("ci");

        return DB::table("staffs")->select("staffs.*", "departments.name as direccion")->join("departments", "departments.id", "=", "staffs.department_id")->where("ci", "=", $ciParam)->get();
    }

    public function create(Request $request){
        $staffs = new Staffs();
        $staffs->ci = $request->ci;
        $staffs->names = $request->names;
        $staffs->surnames = $request->surnames;
        $staffs->position = $request->position;
        $staffs->department_id  = $request->departmentId;
        $staffs->save();

    }

    public function update(Request $request){
        $staffs = Staffs::findOrFail($request->id);
        $staffs->ci = $request->ci;
        $staffs->names = $request->names;
        $staffs->surnames = $request->surnames;
        $staffs->position = $request->position;
        $staffs->department_id  = $request->departmentId;
        $staffs->save();

    }

    public function destroy(Request $request){
        $taffs = Staffs::findOrFail($request->id);
        $taffs->active = 0;
        return $taffs;
    } 

}

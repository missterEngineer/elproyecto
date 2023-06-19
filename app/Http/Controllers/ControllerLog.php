<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ControllerLog extends Controller{


    public function getAll(Request $request){

        $dateBefore = $request->query("dateBefore");
        $dateAfter = $request->query("dateAfter");

        if($dateBefore == "null" || $dateAfter == "null"){

            return DB::table("log")
            ->select("log.*", "users.ci", "users.username")
            ->join("users", "users.id", "=", "log.user_id")
            ->orderBy('log.date', 'ASC')
            ->get();

        }

        return DB::table("log")
                ->select("log.*", "users.ci", "users.username")
                ->join("users", "users.id", "=", "log.user_id")
                ->whereBetween("log.date", [$dateBefore, $dateAfter])
                ->orderBy('log.date', 'ASC')
                ->get();
        
    }


}
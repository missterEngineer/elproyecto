<?php

namespace App\Observers;

use App\Assigned_goods;
use App\Goods;
use App\Staffs;
use App\Log;

class aisgObserver{


    public function created(Assigned_goods $assigned_goods){

        $funcionario = Staffs::findOrFail($assigned_goods->staff_id);
        $articulo = Goods::findOrFail($assigned_goods->goods_id);


        $log = new Log();
        $log->action = "El articulo ($articulo->name) ha sido asignado ($funcionario->names)";
        $log->date = date("y-m-d");
        $log->user_id = $assigned_goods->user_id;
        $log->save();

    }

    
}
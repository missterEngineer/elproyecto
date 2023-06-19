<?php

namespace App\Observers;

use App\Goods;
use App\Log;

class GoodObserver{



    public function created(Goods $goods){

        $articulo = Goods::findOrFail($goods->id);

        $log = new Log();
        $log->action = "Se ha registrado un nuevo articulo($articulo->name)";
        $log->date = date("y-m-d");
        $log->user_id = $goods->user_id;
        $log->save();

    }


    // public function updated(Goods $goods){

    //     $articulo = Goods::findOrFail($goods->id);

    //     $log = new Log();
    //     $log->action = "Se ha actualizado la informacion ($articulo->name";
    //     $log->date = date("y-m-d");
    //     $log->user_id = $goods->user_id;
    //     $log->save();

    // }

    
}
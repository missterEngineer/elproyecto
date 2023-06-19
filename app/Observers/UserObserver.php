<?php

namespace App\Observers;

use App\User;
use App\Log;

class UserObserver{


    /**
     * Listen to the User created event.
     *
     * @param  \App\User  $user
     * @return void
     */

    public function created(User $user){

        $log = new Log();
        $log->action = "se ha creado un nuevo usuario";
        $log->date = date("y-m-d");
        $log->user_id = 1;

        $log->save();
    }


    // public function updated(User $user){

    //     // $user->id

    //     $log = new Log();
    //     $log->action = "Actualizo la informacion de un usuario";
    //     $log->date = date("y-m-d");
    //     $log->user_id = 1;

    //     $log->save();
    // }

    
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model{

    protected $table = 'log';

    protected $fillable = ["id", "action", "date", "user_id"];

    public $timestamps = false;

  

    public function users(){
        return $this->hashMany(User::class);
    }


}

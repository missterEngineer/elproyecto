<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model{
    
    protected $table = 'profiles';

    protected $fillable = ["name"];

    public $timestamps = false;


    public function users(){
        return $this->hashMany(User::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    
    protected $table = 'users';

    protected $fillable = ["names", "surnames", "username", "ci", "password", "active", "profile_id"];
    
    public $timestamps = false;

    public function profiles(){
        return $this->belongsToMany(Profiles::class);
    }

    public function log(){
        return $this->belongsToMany(Log::class);
    }

    public function returned_goods(){
        return $this->hashMany(Returned_goods::class);
    }

    public function goods(){
        return $this->hashMany(Assigned_goods::class);
    }

    public function assigned_goods_observations(){
        return $this->hashMany(Assigned_goods_observations::class);
    }



    protected $hidden = ['password'];


}

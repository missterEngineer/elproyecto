<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model{
    
    protected $table = 'goods';

    protected $fillable = ["name", "brand", "description", "cod", "uds", "uds_available", "state_id", "date", "active", "category_id", "user_id"];

    public $timestamps = false;


    public function categories(){
        return $this->belongsToMany(Categories::class);
    }

    public function assigned_goods(){
        return $this->hashMany(Assigned_goods::class);
    }

    public function users(){
        return $this->hashMany(User::class);
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assigned_goods extends Model{
    
    protected $table = 'assigned_goods';

    protected $fillable = ["date", "active", "uds", "user_id", "staff_id", "goods_id"];

    public $timestamps = false;


    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function goods(){
        return $this->belongsToMany(Goods::class);
    }

    public function staffs(){
        return $this->belongsToMany(Staffs::class);
    }

    public function assigned_goods_observations(){
        return $this->hashMany(Assigned_goods_observations::class);
    }

    public function returned_goods(){
        return $this->hashMany(Returned_goods::class);
    }

  

}

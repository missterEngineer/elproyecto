<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assigned_goods_observations extends Model{

    protected $table = 'assigned_goods_observations';

    protected $fillable = ["date", "observation", "assigned_good_id"];

    public $timestamps = false;


    public function assigned_goods(){
        return $this->belongsToMany(Assigned_goods::class);
    }

    
}

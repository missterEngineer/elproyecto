<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returned_goods_obserbation extends Model{
    
    protected $table = 'returned_goods_observations';

    protected $fillable = ["date", "observation", "assigned_good_id"];

    public $timestamps = false;


    
    public function returned_goods(){
        return $this->belongsToMany(Returned_goods::class);
    }

}

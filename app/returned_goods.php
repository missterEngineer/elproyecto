<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returned_goods extends Model{
    
    protected $table = 'returned_goods';

    protected $fillable = ["date", "user_id", "staff_id", "uds", "goods_id"];

    public $timestamps = false;



    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function assigned_goods(){
        return $this->belongsToMany(Assigned_goods::class);
    }

    public function returned_goods_obserbation(){
        return $this->hashMany(Returned_goods_obserbation::class);
    }

    

}

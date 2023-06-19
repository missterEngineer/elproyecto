<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staffs extends Model{


    protected $table = 'staffs';

    protected $fillable = ["names", "surnames", "position", "active", "department_id"];

    public $timestamps = false;



    public function departments(){
        return $this->belongsToMany(Departaments::class);
    }

    public function assigned_goods(){
        return $this->hashMany(Assigned_goods::class);
    }


}

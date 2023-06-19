<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model{
    
    protected $table = 'departments';

    protected $fillable = ["states"];

    public $timestamps = false;


    public function users(){
        return $this->hashMany(Staffs::class);
    }

}

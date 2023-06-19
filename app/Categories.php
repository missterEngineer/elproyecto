<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model{
    
    protected $table = 'categories';

    protected $fillable = ["name"];

    public $timestamps = false;



    public function goods(){
        return $this->hashMany(Goods::class);
    }

}

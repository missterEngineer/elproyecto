<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class States extends Model{

    protected $table = 'states';

    protected $fillable = ["name"];
    
    public $timestamps = false;

    public function goods(){
        return $this->hashMany(Goods::class);
    }
    
}

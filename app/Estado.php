<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'nome','uf'
    ];

    public function cidades(){
        return $this->hasMany('App\Cidade','estados_id');
    }
}

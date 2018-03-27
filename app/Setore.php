<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setore extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'nome'
    ];

    public function users(){
      return $this->hasMany('App\User','setores_id');
    }

    public function cidade(){
      return $this->belongsTo('App\Cidade','cidades_id');
    }

}

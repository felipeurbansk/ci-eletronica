<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'nome'
  ];

  public function estado(){
      return $this->belongsTo('App\Estado','estados_id');
  }

  public function setores(){
    return $this->hasMany('App\Setore','cidades_id');
  }
}

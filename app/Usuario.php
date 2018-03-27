<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
  use SoftDeletes;


  protected $hidden = ['senha', 'remember_token'];

  protected $fillable = [
    'nome','email','senha'
  ];

  public function setor(){
    return $this->belongsTo('App\Setore','setores_id');
  }

  public function cis(){
    return $this->hasMany('App\Ci','usuarios_id');
  }

}

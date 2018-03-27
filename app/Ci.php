<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ci extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'assunto','destinatario_id'
    ];

    public function users(){
      return $this->belongsTo('App\User','users_id');
    }

}

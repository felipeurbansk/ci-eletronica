<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ci;
use Auth;

class CiController extends Controller
{
    public function index(){
      return view('adm.ci.index');
    }

    public function salvar(Request $req){
      Auth::user()->cis()->create($req->all());

      return redirect()->route('adm.ci.inicio');
    }

}

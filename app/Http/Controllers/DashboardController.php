<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ci;

class DashboardController extends Controller
{
    public function index(){
      $ci =  Ci::orderBy('created_at','desc')->get();

      return view('adm.dashboard.index',compact('ci'));
    }
}

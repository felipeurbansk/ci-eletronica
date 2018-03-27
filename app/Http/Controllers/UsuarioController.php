<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Setore;
use Auth;

class UsuarioController extends Controller
{

  /*Se o usuário não for administrador é redirecionado direto para pagina de CI*/
  public function index(){
    if(Gate::allows('area-admin',Auth::user())){
      $usuario = User::orderBy('name','asc')->paginate(15);
      return view('adm.usuario.index',compact('usuario'));
    }
    return redirect()->route('adm.ci.inicio');
  }

  public function salvar(Request $req){
    if(Gate::allows('area-admin',Auth::user())){
      $setor = Setore::find($req->input('setores_id'));
      if($setor->users()->create([
          'name' => $req['name'],
          'email' => $req['email'],
          'password' => Hash::make($req['password']),
        ])){
        return redirect()->route('adm.usuario.inicio')->with('sucesso', 'Usuário criado com sucesso!');
      }else{
        return back()->with('erro', 'Erro ao tentar cadastrar um novo usuário');
      }
    }
    return redirect()->route('adm.ci.inicio');
  }

  public function excluir($id){
    if(Gate::allows('area-admin',Auth::user())){
      if(User::find($id)->delete()){
        return redirect()->route('adm.usuario.inicio')->with('sucesso', 'Usuário excluido com sucesso!');
      }else{
        return back()->with('erro', 'Erro ao tentar excluir o usuário');
      }
    }
    return redirect()->route('adm.ci.inicio');
  }

}

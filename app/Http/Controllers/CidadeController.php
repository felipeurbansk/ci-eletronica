<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Cidade;
use App\Estado;
use Auth;

class CidadeController extends Controller
{
    public function index(){
      if(Gate::allows('area-admin',Auth::user())){
        $cidade = Cidade::orderBy('nome','asc')->paginate(15);
        return view('adm.cidade.index',compact('cidade'));
      }
      return redirect()->route('adm.ci.inicio');
    }

    public function salvar(Request $req){
      if(Gate::allows('area-admin',Auth::user())){
        $estado = Estado::find($req->input('estado'));

        if($estado->cidades()->create($req->all())){
          return redirect()->route('adm.cidade.inicio')->with('sucesso', 'Cidade cadastrada com sucesso!');
        }else{
          return back()->with('erro', 'Erro ao tentar cadastrar a cidade');
        }
      }
      return redirect()->route('adm.ci.inicio');
    }

    public function excluir($id){
      if(Gate::allows('area-admin',Auth::user())){
        if(Cidade::find($id)->delete()){
          return redirect()->route('adm.cidade.inicio')->with('sucesso', 'Cidade excluida com sucesso');
        }else{
          return back()->with('erro', 'Erro ao tentar excluir a cidade');
        }
      }
      return redirect()->route('adm.ci.inicio');
    }
}

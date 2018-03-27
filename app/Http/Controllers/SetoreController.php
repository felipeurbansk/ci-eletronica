<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Setore;
use App\Cidade;
use Auth;

class SetoreController extends Controller
{

    public function index(){
      if(Gate::allows('area-admin',Auth::user())){
        $setor = Setore::orderBy('nome','asc')->paginate(15);
        return view('adm.setor.index',compact('setor'));
      }
      return redirect()->route('adm.ci.inicio');
    }

    public function salvar(Request $req){
      if(Gate::allows('area-admin',Auth::user())){
        $cidade = Cidade::find($req->input('cidades_id'));
        if($cidade->setores()->create($req->all())){
          return redirect()->route('adm.setor.inicio')->with('sucesso', 'Setor cadastrado com sucesso');
        }else{
          return back()->with('erro', 'Erro ao tentar cadastrar o setor!');
        }
      }
      return redirect()->route('adm.ci.inicio');
    }

    public function excluir($id){
      if(Gate::allows('area-admin',Auth::user())){
        if(Setore::find($id)->delete()){
          return redirect()->route('adm.setor.inicio')->with('sucesso', 'Setor excluido com sucesso!');
        }else{
          return back()->with('erro', 'Erro ao tentar excluir o setor');
        }
      }

      return redirect()->route('adm.ci.inicio');
    }

    public function consulta(){
      if(Gate::allows('area-admin',Auth::user())){
        $cidade = $_POST['cidade'];
        $setor = Cidade::where('cidade', $cidade);
        return $setor;
      }
      return redirect()->route('adm.ci.inicio');
    }
}

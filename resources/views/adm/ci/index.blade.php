@extends('layouts.template')

@section('content')
<div class="container-fluid">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-envelope"></i> CIs</div>
          <div class="card-body">
            <div class="form-group">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modalCi">
                Nova CI
              </button>
              <!--<div class="form-group">
                <label for="filtro">Filtro</label>
                <select class="form-control" name="">
                  <option value="1">Enviados</option>
                  <option value="2">Recebidos</option>
                </select>
              </div>-->
            </div>
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="40%">Remetente</th>
                    <th width="20%">Destinatario</th>
                    <th width="20%">Data</th>
                    <th width="20%">Ações</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th width="40%">Remetente</th>
                  <th width="20%">Destinatario</th>
                  <th width="20%">Data</th>
                  <th width="20%">Ações</th>
                </tr>
              </tfoot>
              <tbody>
                  @foreach($cis = Auth::User()->cis()->orderBy('created_at','desc')->paginate(15) as $c)
                  <!--foreach(App\Ci::where('destinatario_id','=', Auth::User()->id)->orderBy('created_at','desc')->paginate(15) as $c)-->
                  <tr>
                    <input type="hidden" name="id" value="{{$c->id}}">
                    <td width="40%">{{App\User::find($c->users->id)['name']}}</td>
                    <td width="20%">{{App\User::find($c->destinatario_id)['name']}}</td>
                    <td width="20%">{{$c->created_at}}</td>
                    <td width="20%">
                      <a class="btn btn-danger" href="{{route('adm.ci.excluir',$c->id)}}">Excluir</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="row-fluid">
    					<div class="span6">
    						<div class="pagination" style="text-align: right;">
                    {{$cis->links()}}
    						</div>
    					</div>
				    </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modalCi" tabindex="-1" role="dialog" aria-labelledby="modalCi" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="modalCi">Nova CI</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
                 <form class="form" action="{{route('adm.ci.salvar')}}" method="post">
                   @csrf
                   <div class="form-group">
                     <label for="name">Remetente</label>
                     <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" disabled>
                   </div>
                   <div class="form-group">
                     <label for="email">Setor Remetente</label>
                     <input type="email" name="email" class="form-control" value="{{Auth::user()->setor->nome}}" disabled>
                   </div>
                   <div class="form-group">
                     <label for="cidades_id">Cidade Destinatario</label>
                     <select class="form-control" name="cidades_id" id="cbx_cidade">
                       @foreach(App\Cidade::orderBy('nome','asc')->get() as $c)
                       <option value="{{$c->id}}">{{$c->nome}}</option>
                       @endforeach
                     </select>
                   </div>
                   <div class="form-group">
                     <label for="setor_id">Setor Destinatario</label>
                     <select class="form-control" name="setor_id">
                       @foreach(App\Setore::orderBy('nome','asc')->get() as $s)
                         <option value="{{$s->id}}">{{$s->nome}}</option>
                       @endforeach
                     </select>
                   </div>
                   <div class="form-group">
                     <label for="destinatario_id">Destinatario Final</label>
                     <select class="form-control" name="destinatario_id">
                       @foreach(App\Setore::find(2)->users as $s)
                         <option value="{{$s->id}}">{{$s->name}}</option>
                       @endforeach
                     </select>
                   </div>
                   <div class="form-group">
                     <label for="assunto">Assunto</label>
                       <textarea name="assunto" class="form-control" rows="8" cols="80"></textarea>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                     <button type="submit" class="btn btn-primary">Enviar</button>
                   </div>
                 </form>
             </div>
           </div>
         </div>
       </div>
    </div>
@endsection

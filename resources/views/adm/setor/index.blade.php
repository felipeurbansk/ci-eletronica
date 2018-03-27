@extends('layouts.template')

@section('content')
<div class="container-fluid">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-flag"></i> Setores Cadastrados</div>
          <div class="card-body">
            <div class="form-group">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro">
                Novo Setor
              </button>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="40%">Setor</th>
                    <th width="5%">Usuários</th>
                    <th width="5%">Cidade</th>
                    <th width="20%">Ações</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th width="40%">Setor</th>
                  <th width="5%">Usuários</th>
                  <th width="5%">Cidade</th>
                  <th width="20%">Ações</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($setor as $s)
                  <tr>
                    <input type="hidden" name="id" value="{{$s->id}}">
                    <td width="40%">{{$s->nome}}</td>
                    <td width="5%">{{$s->users->count()}}</td>
                    <td width="5%">{{$s->cidade->nome}}</td>
                    <td width="20%">
                      <div class="btn-group">
                          <a href="{{route('adm.setor.excluir',$s->id)}}" class="btn btn-danger">Excluir</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="row-fluid">
    					<div class="span6">
    						<div class="pagination" style="text-align: right;">
                    {{$setor->links()}}
    						</div>
    					</div>
				    </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
     <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastro" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCadastro">Novo Setor</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{route('adm.setor.salvar')}}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="nome">Setor</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome do Setor">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cidade</label>
                    <select class="form-control" name="cidades_id">
                      @foreach($cidade = App\Cidade::orderBy('nome','asc')->get() as $c)
                        <option value="{{$c->id}}">{{$c->nome}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
</script>

@extends('layouts.template')

@section('content')
<div class="container-fluid">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-globe"></i> Cidades Cadastradas</div>
          <div class="card-body">
            <div class="form-group">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro">
                Adicionar cidade
              </button>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>UF</th>
                    <th>Ações</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nome</th>
                  <th>Estado</th>
                  <th>UF</th>
                  <th>Ações</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($cidade as $c)
                  <tr>
                    <input type="hidden" name="id" value="{{$c->id}}">
                    <td>{{$c->nome}}</td>
                    <td>{{$c->estado->nome}}</td>
                    <td>{{$c->estado->uf}}</td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{route('adm.cidade.excluir',$c->id)}}">Excluir</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Ver setores</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="row-fluid">
    					<div class="span6">
    						<div class="pagination" style="text-align: right;">
                    {{$cidade->links()}}
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
              <h5 class="modal-title" id="modalCadastro">Adicionar cidade</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{route('adm.cidade.salvar')}}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome da cidade">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Estado</label>
                    <select class="form-control" name="estado">
                      @foreach($estado = App\Estado::all() as $e)
                        <option value="{{$e->id}}">{{$e->nome}}</option>
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

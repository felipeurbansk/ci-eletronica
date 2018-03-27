@extends('layouts.template')

@section('content')
<div class="container-fluid">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-flag"></i> Usuários Cadastrados</div>
          <div class="card-body">
            <div class="form-group">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro">
                Novo Usuário
              </button>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="40%">Nome</th>
                    <th width="20%">E-mail</th>
                    <th width="20%">Setor</th>
                    <th width="20%">Ações</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th width="40%">Nome</th>
                  <th width="20%">E-mail</th>
                  <th width="20%">Setor</th>
                  <th width="20%">Ações</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($usuario as $u)
                  <tr>
                    <input type="hidden" name="id" value="{{$u->id}}">
                    <td width="40%">{{$u->name}}</td>
                    <td width="20%">{{$u->email}}</td>
                    <td width="20%">{{$u->setor->nome}}</td>
                    <td width="20%">
                      <a class="btn btn-danger" href="{{route('adm.usuario.excluir',$u->id)}}">Excluir</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="row-fluid">
    					<div class="span6">
    						<div class="pagination" style="text-align: right;">
                    {{$usuario->links()}}
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
              <h5 class="modal-title" id="modalCadastro">Novo Usuário</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{route('adm.usuario.salvar')}}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome">
                  </div>
                  <div class="form-group">
                    <label for="nome">E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail">
                  </div>
                  <div class="form-group">
                    <label for="nome">Senha</label>
                    <input type="password" name="senha" class="form-control" placeholder="Senha">
                  </div>
                  <div class="form-group">
                    <label for="nome">Confirmar senha</label>
                    <input type="password" name="senha2" class="form-control" placeholder="Confirmar senha">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cidade</label>
                    <select class="form-control" name="cidades_id">
                      @foreach($cidade = App\Cidade::orderBy('nome','asc')->get() as $c)
                        <option value="{{$c->id}}">{{$c->nome}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Setor</label>
                    <select class="form-control" name="setores_id">
                      @foreach($setor = App\Setore::orderBy('nome','asc')->get() as $s)
                        <option value="{{$s->id}}">{{$s->nome}}</option>
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

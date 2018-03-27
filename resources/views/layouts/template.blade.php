@include('layouts._includes.header');
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">{{config('app.titulo')}}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{route('adm.dashboard.inicio')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text"> Dashboard</span>
          </a>
        </li>
        <!--Restrição admin-->
        @if(Auth::user()->admin == 1)
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
              <a class="nav-link" href="{{route('adm.usuario.inicio')}}">
                <i class="fa fa-fw fa-group"></i>
                <span class="nav-link-text"> Usuários</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-briefcase"></i>
                <span class="nav-link-text">Pontos de trabalho</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapseComponents">
                <li>
                  <a href="{{route('adm.setor.inicio')}}"><i class="fa fa-fw fa-flag"></i> Setores</a>
                </li>
                <li>
                  <a href="{{route('adm.cidade.inicio')}}"><i class="fa fa-fw fa-globe"></i> Cidades</a>
                </li>
              </ul>
            </li>
        @endif
        <!--Fim restrição admin-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('adm.ci.inicio')}}">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text"> CIs</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <a class="text-white" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            Sair
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      @if(session('erro'))
        <div class="alert alert-error">
          <strong>Erro!</strong>
          <ul>
            {{session('erro')}}
          </ul>
        </div>
      @endif
      @if(session('sucesso'))
        <div class="alert alert-success">
          <strong>Sucesso!</strong>
          <ul>
            {{session('sucesso')}}
          </ul>
        </div>
      @endif
  @yield('content')

@include('layouts._includes.footer');

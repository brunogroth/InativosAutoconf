<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Inativos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('list')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Sites
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('list')}}">Listar</a>
            <a class="dropdown-item" href="{{route('create')}}">Cadastrar</a> 
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="https://app.autoconf.com.br">Retornar para o Autoconf</a>
          </div>
          <li class="nav-item active">
            <a class="nav-link" href="https://app.autoconf.com.br">Retornar para o Autoconf</a>
          </li>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <button class="btn btn-danger my-2 my-sm-0 me-2" type="submit">Logoff</button>
      </form>
    </div>
  </nav>    
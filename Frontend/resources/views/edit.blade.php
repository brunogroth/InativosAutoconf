@extends('template.template')
@section('title', 'Sites Inativos')
@section('content')
    <div class="container-fluid">
      <h3>Editar site {{$site->name}}</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('update')}}">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{$site->id}}">
            <div class="form-group">
                <label for="formGroupExampleInput">Nome da Loja - #ID </label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="BellosCar - #7" value="{{ old('name', $site->name)}}">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">URL do site</label>
                <input type="url" class="form-control" id="formGroupExampleInput2" name="url" placeholder="https://sitedaloja.com.br" value="{{ old('url', $site->url)}}">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Data inicial</label>
                {{-- Esse input não é utilizado no Http::put do Controller, pois a data de criação não é alterada no backend. Campo puramente informacional.
                  Por isso o campo está sem o atributo name="". --}}
                <input id="initialDate" type="text" class="form-control" id="formGroupExampleInput2" value="{{ old('created_at', date('M-d-Y', strtotime($site->created_at))) }}" readonly>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Status</label>
              <select id="amountTime" name="status" class="custom-select">
                  <option value="0" {{ old('status', $site->status) == 0 ? "selected" : "" }}>Aguardando Pausa</option>
                  <option value="1" {{ old('status', $site->status) == 1 ? "selected" : "" }}>Site Pausado - Aguardando pagamento</option>
                  <option value="2" {{ old('status', $site->status) == 2 ? "selected" : "" }}>Aguardando Desativamento</option>
                  <option value="3" {{ old('status', $site->status) == 3 ? "selected" : "" }}>Desativado</option>
                  <option value="4" {{ old('status', $site->status) == 4 ? "selected" : "" }}>Cliente Recuperado</option>
              </select>
          </div>
          <div class="form-group">
                <label for="formGroupExampleInput2">Data final</label>
                <input type="date" id="finalDate" name="final_date" class="form-control" id="formGroupExampleInput2" value="{{ old('created_at',date('Y-m-d', strtotime($site->final_date))) }}">
            </div>
            <div class=" my-2 my-lg-0 d-flex flex-row-reverse mr-5">
                <button type="submit" class="btn btn-success px-4">Editar</button>
                <a href="/" class="btn btn-primary px-4 mr-3">Voltar</a>
            </div>
        </form>
    </div>
    </div>

@endsection

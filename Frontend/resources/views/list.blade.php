@extends('template.template')
@section('title', 'Sites Inativos')
@section('content')
    <style>
        .expired {
            color: red;
        }

        .valid {
            color: green;
        }

        .table-success {
            color: rgba(0, 0, 0, 0.65);
        }
    </style>
    <div class="site-filter">
        <form class="row gx-3 gy-2 align-items-center mb-3 " method="get" action="{{route('filter')}}">
            @csrf
            <label for="status">Filtro Status</label>
            <div class="col-sm-3">
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected>Todos</option>
                    <option value="0">Aguardando Pausa</option>
                    <option value="1">Pausado - Aguardando pagamento</option>
                    <option value="2">Aguardando Desativamento</option>
                    <option value="3">Desativado</option>
                    <option value="4">Recuperado</option>
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" type="submit"> <i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
            <div class="col-auto">
                <a href="{{route('list')}}" class="btn btn-danger" type="submit"> <i class="fa fa-trash" aria-hidden="true"></i></a>
            </div>
        </form>    
    </div>
        <table class="table table-bordered table-wrap shadow-lg">
            <tr class="thead-primary">
                <th scope="col">Nome da loja - #ID</th>
                <th scope="col">URL do site</th>
                <th scope="col">Criado em</th>
                <th scope="col">Desativar em</th>
                <th scope="col">Status</th>
                <th scope="col">Tempo restante</th>
                <th scope="col">Editar</th>
                <th scope="col">Cliente Recuperado?</th>
                <th scope="col">Deletar</th>
            </tr>
            @foreach ($sites->data as $site)
                <tr
                    class=" @if ($site->status == 'Recuperado') table-success @elseif($site->time_left <= 2 && $site->time_left > 0) table-warning @endif ">
                    <th scope="row">{{ $site->name }}</td>
                    <td>{{ $site->url }}</td>
                    <td>{{ $site->created_at }}</td>
                    {{-- condição com bug --}}
                    <td class="{{-- @if ($site->final_date > $today) expired @else valid @endif --}}">
                        {{ $site->final_date }}
                    </td>
                    <td>{{ $site->status }}</td>
                    <td {{-- class="@if ($site->time_left > 0) text-warning @else text-danger @endif" --}}>{{ $site->time_left > 0 ? $site->time_left . ' dias' : '-' }}</td>
                    <td>
                        <a href="{{ route('edit', $site->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                    <td style="text-align: center">
                        @if ($site->status !== 'Recuperado')
                            <form method="POST" action="recover">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="id" value="{{ $site->id }}">
                                <button class="btn btn-success">Recuperar</button>
                            </form>
                        @else
                            <span style="font-size: 2rem">✅</span>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="inactivate">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="id" value="{{ $site->id }}">
                            <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href='{{ route('list', 'page=1') }}' aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            @for ($i = 1; $i <= $sites->last_page; $i++)
                                <li class="page-item"><a class="page-link"
                                        href='{{ route('list', 'page=' . $i) }}'>{{ $i }}</a></li>
                            @endfor
                            <li class="page-item">
                                <a class="page-link" href='{{ route('list', 'page=' . $i - 1) }}' aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-4">
                    <div class=" my-2 my-lg-0 d-flex flex-row-reverse mr-5">
                        <a href='{{ Route('create') }}' class="btn btn-primary my-2 my-sm-0">Criar novo</a>
                    </div>
                </div>
                {{-- <form class="form-inline my-2 my-lg-0 -right d-flex flex-row-reverse mr-5">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Criar novo</button>
        </form> --}}

            </div>
        @endsection

@extends('template.template')
@section('title', 'Sites Inativos')
@section('content')
<style>
    .expired{
        color: red;
    }
    .valid{
        color: green;
    }

    .table-success{
        color: rgba(0, 0, 0, 0.65);
    }
</style>
    <div>
        <table class="table table-bordered shadow-lg">
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
            @foreach($sites as $site)
                <tr class="
                    @if($site->status == "Recuperado") table-success 
                    @elseif($site->time_left < 2 && $site->time_left > 0) table-warning
                    @endif
                    ">
                    <th scope="row">{{$site->name}}</td>
                <td>{{$site->url}}</td>
                    <td>{{$site->created_at}}</td>
                    <td class="@if($site->final_date > date("Y/m/d")) expired @else valid @endif">
                        {{ $site->final_date }}
                    </td>
                    <td>{{$site->status}}</td>
                    <td
                    {{-- class="@if($site->time_left > 0) text-warning @else text-danger @endif" --}}
                    >{{$site->time_left > 0 ? $site->time_left . ' dias': '-'}}</td>
                    <td>
                        <a href="{{route('edit', $site->id)}}" class="btn btn-warning">Editar</a>
                    </td>
                    <td style="text-align: center">
                        @if($site->status !== "Recuperado")
                            <form method="POST" action="recover">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="id" value="{{$site->id}}">
                                <button class="btn btn-success">Recuperar</button>
                            </form>
                        @else 
                            <span style="font-size: 2rem">✅</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('edit', $site->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{-- <form class="form-inline my-2 my-lg-0 -right d-flex flex-row-reverse mr-5">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Criar novo</button>
        </form> --}}
        <div class=" my-2 my-lg-0 d-flex flex-row-reverse mr-5">
            <a href='{{ Route('create') }}' class="btn btn-primary my-2 my-sm-0">Criar novo</a>
        </div>
    </div>
@endsection

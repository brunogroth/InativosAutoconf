@extends('template.template')
@section('title', 'Sites Inativos')
@section('content')
<style>
    .expired{
        color: red;
    }
    .valid{
        background: rgba(0, 128, 0, 0.7);
        color: white;
    }
</style>
    <div>
        <table class="table">
            <tr class="thead-primary">
                <th scope="col">Nome da loja - #ID</th>
                <th scope="col">URL do site</th>
                <th scope="col">Data Inicial</th>
                <th scope="col">Tempo expiração</th>
                <th scope="col">Status</th>
                <th scope="col">Data Final</th>
            </tr>
            @foreach($sites as $site)
                <tr>
                    <th scope="row">{{$site->name}}</td>
                    <td>{{$site->url}}</td>
                    <td>{{date('d/m/Y', strtotime($site->created_at))}}</td>
                    <td>15d</td>
                    <td>{{$site->status}}</td>
                    <td class="@if($site->final_date > date("Y/m/d"))expired @else valid @endif">{{
                    date('d/m/Y', strtotime($site->final_date))}}</td>
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

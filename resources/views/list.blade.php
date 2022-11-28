@extends('template.template')
@section('title', 'Sites Inativos')
@extends('template.nav')
@section('content')
    <h2 class="text-primary my-4">Inativos Autoconf</h2>
    <div>
        <table class="table">
            <tr class="thead-primary table-primary">
                <th scope="col">Nome da loja - #ID</th>
                <th scope="col">URL do site</th>
                <th scope="col">Data Inicial</th>
                <th scope="col">Tempo expiração</th>
                <th scope="col">Data Final</th>
            </tr>
            <tr>
                <td scope="row">Sample Motors - #123</td>
                <td>https://samplemotors.com</td>
                <td>Date.now</td>
                <td>15d</td>
                <td>13/12/2022</td>
            </tr>
            <tr>
                <td scope="row">Other Motors - #434</td>
                <td>https://othermotors.com</td>
                <td>Date.now</td>
                <td>15d</td>
                <td>13/12/2022</td>
            </tr>
        </table>
        <form class="form-inline my-2 my-lg-0 text-left">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Criar novo</button>
        </form>
    </div>
    </div>
@endsection

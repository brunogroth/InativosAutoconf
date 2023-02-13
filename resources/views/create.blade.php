@extends('template.template')
@section('title', 'Sites Inativos')
@section('content')
    <div class="container-fluid">
        create works
        <form class="">
            <div class="form-group">
                <label for="formGroupExampleInput">Nome da Loja - #ID </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="BellosCar - #7">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">URL do site</label>
                <input type="url" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Data inicial</label>
                <input type="url" class="form-control" id="formGroupExampleInput2" placeholder="Date.now" readonly>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Tempo de Expiração</label>
                <select class="custom-select">
                    <option value="1" selected>15 dias</option>
                    <option value="2">15 dias</option>
                    <option value="3">30 dias</option>
                    <option value="4">45 dias</option>
                    <option value="5">45 dias</option>
                </select>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Data inicial</label>
                <input type="url" class="form-control" id="formGroupExampleInput2" placeholder="Date.now + expiration.date" readonly>
            </div>
            <div class=" my-2 my-lg-0 d-flex flex-row-reverse mr-5">
                <button class="btn btn-success px-4">Criar</button>
            </div>
        </form>
    </div>
    </div>
@endsection

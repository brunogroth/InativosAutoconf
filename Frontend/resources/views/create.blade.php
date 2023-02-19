@extends('template.template')
@section('title', 'Sites Inativos')
@section('content')
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('store')}}">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Nome da Loja - #ID </label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="BellosCar - #7">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">URL do site</label>
                <input type="url" class="form-control" id="formGroupExampleInput2" name="url" placeholder="https://sitedaloja.com.br">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Data inicial</label>
                <input id="initialDate" type="date" class="form-control" name="initial_date" id="formGroupExampleInput2" >
            </div>
            <input type="hidden" id="status" name="status" value="0">
            <div class="form-group">
                <label for="formGroupExampleInput2">Tempo de Expiração</label>
                <select id="amountTime" name="expiration" onchange="updateRemainTime()" class="custom-select">
                    <option value="15" selected>15 dias</option>
                    <option value="30">30 dias</option>
                    <option value="45">45 dias</option>
                    <option value="60">60 dias</option>
                </select>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Data final</label>
                <input type="text" id="finalDate" name="final_date" class="form-control" id="formGroupExampleInput2" readonly>
            </div>
            <div class=" my-2 my-lg-0 d-flex flex-row-reverse mr-5">
                <button type="submit" class="btn btn-success px-4">Criar</button>
                <a href="/" class="btn btn-primary px-4 mr-3">Voltar</a>
            </div>
        </form>
    </div>
    </div>
    <script>

        var initialDateInput = document.getElementById('initialDate');
        initialDateInput.valueAsDate = new Date();
        

        function updateRemainTime(){
        const initialDate = new Date(); // This need to be the Initial Date input
        var finalDate = new Date();
        var amountTime = document.getElementById('amountTime').value;
        amountTime = parseInt(amountTime);
        // console.log('Time Left: ' + amountTime);
        // console.log('initialDate' + initialDate.getDate());
        finalDate.setDate(initialDate.getDate() + amountTime);
        // console.log('finaldate'+finalDate);
        
        var finalDateInput = document.getElementById('finalDate');
        
        console.log(finalDate);
        
        //formatting date
        var year = finalDate.getFullYear();
        var month = (1 + finalDate.getMonth()).toString();
        month = month.length > 1 ? month : '0' + month;

        var day = finalDate.getDate().toString();
        day = day.length > 1 ? day : '0' + day;
    
        finalDate = day+'/'+month+'/'+year;

        finalDateInput.value = finalDate;
    }
    updateRemainTime();
    
    </script>
@endsection

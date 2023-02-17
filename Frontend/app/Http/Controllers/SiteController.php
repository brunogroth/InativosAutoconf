<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{

    public function index()
    {

        $response = Http::get('http://127.0.0.1:8001/api/list');
        $sites = $response->object();
        
        foreach($sites as $site){
            switch($site->status){
                case 0: 
                    $site->status = "Aguardando Inativação Temporária";
                    break;
                case 1:
                    $site->status = "Inativo - Aguardando pagamento";
                    break;
                case 2:
                    $site->status = "Aguardando Desativamento Definitivo";
                    break;
                case 3:
                    $site->status = "Desativado Definitivamente";
                    break;
                case 4:
                    $site->status = "Recuperado";
                    break;
                default:
                    dd('default');
                break;
            }
        }


        return view('list', compact('sites'));
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request, $id)
    {

        return null;
    }
}

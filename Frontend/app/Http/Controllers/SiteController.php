<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Site;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{

    public function index()
    {

        $response = Http::get('http://127.0.0.1:8000/api/list');
        $sites = $response->object();
        $today = date('Y-m-d');

        foreach($sites as $site){
            $time_left = (strtotime($site->final_date) - strtotime($today)) / 86400;
            
            $site->created_at = date('d/m/Y', strtotime($site->created_at));
            $site->final_date = date('d/m/Y', strtotime($site->final_date));
            // Tempo Restante
            switch($site->status){
                case 0: 
                    $site->status = "Aguardando Pausa";
                    break;
                case 1:
                    $site->status = "Pausado - Aguardando pagamento";
                    break;
                case 2:
                    $site->status = "Aguardando Desativamento";
                    break;
                case 3:
                    $site->status = "Desativado";
                    break;
                case 4:
                    $site->status = "Recuperado";
                    break;
            }
            $site->time_left = $time_left;
        }

        return view('list', compact('sites'));
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
       
        $input = $request->all();
        $final_date = $request->input('final_date');
        $initial_date = date('d-m-Y 23:59:59', strtotime($request->input('initial_date')));
        $final_date = date('d-m-Y 23:59:59', strtotime($request->input('final_date')));
        $input['final_date'] = $final_date;
        $input['initial_date'] = $initial_date;
        dd($input, "initial", $initial_date, "final", $final_date);

    }
}

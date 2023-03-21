<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Site extends Model
{
    use HasFactory;

    protected $table = "sites_inativos";

    protected $fillable = [
        'name',
        'url',
        'status',
        'final_date',
    ];

    public static function getSites($page, $filters = null){
        if (!isset($filters)) {
        $response = Http::get('http://127.0.0.1:8000/api/list?page='.$page);
    } else {
        $response = Http::get('http://127.0.0.1:8000/api/filter?'. $filters);
    }
        //dd($response->getBody()->getContents());
        $sites = $response->object();
        $today = date('Y-m-d');

        foreach($sites->data as $site){
            $time_left = (strtotime($site->final_date) - strtotime($today)) / 86400;
            
            $site->created_at = date('d/m/Y', strtotime($site->created_at));
            $site->final_date = date('d/m/Y', strtotime($site->final_date));
            
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
        //dd($sites);

        return ($sites);
    }
}

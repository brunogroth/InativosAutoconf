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

    // public static function getSites(){
    //     $response = Http::get('http://127.0.0.1:8000/api/list');
    //     $response->body();

    //     $data = $response->json();
    //     return $response;
    // }
}

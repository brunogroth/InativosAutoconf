<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{
    // protected $apiService;

    // public function __construct(Site $site)
    // {
    //     $this->apiService = $site;
    // }
    public function index(){

        // $sites =  $this->apiService->getSites();

//        $response = Http::get('http://127.0.0.1:3001/api/list');
//        $data = json_decode($response->body(), true);


        return view('list');
    }

    public function create()
    {
        return view('create');
    }
}

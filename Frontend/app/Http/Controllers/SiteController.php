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

        $sites = Site::getSites();

        return view('list', compact('sites'));
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
      
        $input = $request->only('name', 'url', 'status', 'final_date');
        
        $validated = $request->validate([
            'name' => 'required|max:255',
            'url' => 'required|url',
            'status' => 'required|numeric|max:4',
            'final_date' => 'required'
        ]);

        $final_date = $request->input('final_date');
        $initial_date = date('d-m-Y 23:59:59', strtotime($request->input('initial_date')));
        $final_date = date('Y-m-d', strtotime($request->input('final_date')));
        $input['final_date'] = $final_date;
        // $input['initial_date'] = $initial_date;
        
        $response = Http::withToken($request->_token)->post('http://127.0.0.1:8000/api/create', $input);
        $r = $response->getBody()->getContents();
        // dd($r);
        
        $sites = Site::getSites();
        return view('list', compact('sites'));
    }

    public function edit(int $id)
    {
        $site = Http::get('http://127.0.0.1:8000/api/show/' . $id);
        //dd($site->getBody()->getContents());
        $site = $site->object();
        
        
        return view('edit', compact('site'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'url' => 'required|url',
            'status' => 'required|numeric|max:4',
            'final_date' => 'required'
        ]);

        $id = $request->get('id');
        $input = $request->only('name', 'url', 'status', 'final_date');
        
        $response = Http::put('http://127.0.0.1:8000/api/update/' . $id, $input);
        dd($response);
    }
}

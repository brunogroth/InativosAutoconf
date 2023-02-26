<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Site::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $existingSite = Site::where('url', $request->input('url'))
            ->where('status', 5);
        
        if ($existingSite->count() > 0) {
            Site::where('url', $request->input('url'))
                ->where('status', 5)
                ->update($request->all());
        } else {
            
            return Site::create($request->all());
        }
        return response('Created', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return Site::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $site = Site::findOrFail($id);
        $site->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $site = Site::findOrFail($id);
        $site->delete();

        return response(200);
    }

    /**
     * Quando o Churn é cancelado (o cliente foi recuperado).
     * Marca o Site com status 4 - Recuperado.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recover(int $id)
    {
        $site = Site::findOrFail($id);
        $site->update(['status' => 4]);

        return response(200);
    }

    public function inactivate(int $id)
    {
        $site = Site::findOrFail($id);
        $site->update(['status' => 5]);

        return response(200);
    }
}

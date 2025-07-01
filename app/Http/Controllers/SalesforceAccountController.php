<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class SalesforceAccountController extends Controller
{
    public $object_name = "Account";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sobject-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $account_name = $request->get('account-name');
        $instance_url = session('sf_instance_url');
        $access_token = session('sf_access_token');
        $version = 'v62.0';

        $url = "$instance_url/services/data/$version/sobjects/$this->object_name";

        $response = Http::withToken($access_token)->post($url, [
            "Name" => $account_name
        ]);
        return $response->body();
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

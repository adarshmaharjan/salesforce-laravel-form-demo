<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountFromRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SalesforceAccountController extends Controller
{
    public $object_name = "Account";
    public $instance_url;
    public  $access_token;
    public $version = 'v62.0';
    public $salesforceBaseUrl;

    function __construct()
    {
        $this->instance_url = session('sf_instance_url');
        $this->access_token = session('sf_access_token');
        $this->salesforceBaseUrl = "$this->instance_url/services/data/$this->version";
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accountQueryUrl = "$this->salesforceBaseUrl/query";
        $response = Http::withToken($this->access_token)->get($accountQueryUrl, [
            'q' => 'SELECT Name, Phone, Fax, AnnualRevenue, TickerSymbol, Sic, NumberOfEmployees FROM ACCOUNT ORDER BY  CreatedDate Desc LIMIT 5'
        ]);

        if ($response->failed()) {
            return $response->body();
        }

        $data = collect($response->json());

        return view('salesforce.accounts', [
            "data" => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('account-form');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(AccountFromRequest $request)
    {
        $validated = $request->validated();

        $response = Http::withToken($this->access_token)->post($this->salesforceBaseUrl . "/sobjects/$this->object_name", [
            "Name" => $validated['account-name'],
            "Phone" => $validated['phone'],
            'Fax' => $validated['fax'],
            "AnnualRevenue" => $validated["annual-revenue"],
            "TickerSymbol" => $validated["ticker-symbol"],
            "Sic" => $validated['sic-code'],
            "NumberOfEmployees" => $validated["employees"],
        ]);

        if ($response->failed()) {
            return $response->body();
        }

        return view('components.success');
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

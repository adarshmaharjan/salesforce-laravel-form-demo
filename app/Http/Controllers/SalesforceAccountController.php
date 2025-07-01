<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountFromRequest;
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
        return view('home');
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
        $instance_url = session('sf_instance_url');
        $access_token = session('sf_access_token');
        $version = 'v62.0';
        $url = "$instance_url/services/data/$version/sobjects/$this->object_name";
        $response = Http::withToken($access_token)->post($url, [
            "Name" => $validated['account-name'],
            "Phone" => $validated['phone'],
            'Fax' => $validated['fax'],
            "AnnualRevenue" => $validated["annual-revenue"],
            "TickerSymbol" => $validated["ticker-symbol"],
            "sic" => $validated['sic-code'],
            "NumberOfEmployees" => $validated["employees"],

            // "Site" => $validated['website']
            // "Rating" => $request->get('rating'),
            // "ParentAccount" => $request->get('parent-account'),
            // "Type" => $request->get('type'),
            // "Ownership" => $request->get('ownership'),
            // "Industry" => $request->get("industry"),

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

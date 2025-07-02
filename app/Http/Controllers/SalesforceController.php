<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class SalesforceController extends Controller
{
    public function redirectToSalesforce()
    {
        $client_id = env('SF_CONSUMER_KEY');
        $redirect_uri = env('SF_CALLBACK_URI');
        $response_type = 'code';

        $query = http_build_query(
            [
                'client_id' => $client_id,
                'redirect_uri' => $redirect_uri,
                'response_type' => $response_type
            ]
        );
        return redirect(env('SF_LOGIN_URL') . '/services/oauth2/authorize?' . $query);
    }

    public function handleCallback(Request $request)
    {
        $code = $request->get('code');
        $response = Http::asForm()->post(env('SF_LOGIN_URL') . '/services/oauth2/token', [
            'grant_type' => env('SF_AUTH_METHOD'),
            'code' => $code,
            'client_id' => env('SF_CONSUMER_KEY'),
            'client_secret' => env('SF_CONSUMER_SECRET'),
            'redirect_uri' => env('SF_CALLBACK_URI')
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to get the token', 'details' => $response->body()]);
        }
        $data = $response->json();

        session([
            'sf_access_token' => $data['access_token'],
            'sf_refresh_token' => $data['refresh_token'],
            'sf_instance_url' => $data['instance_url']
        ]);

        return redirect()->route('account');
    }


    public function querySalesforceData()
    {
        $accessToken = session('sf_access_token');
        $instanceUrl = session('sf_instance_url');
        $response = Http::withToken($accessToken)
            ->get($instanceUrl . '/services/data/v62.0/query', [
                'q' => 'SELECT Id, Name FROM Account LIMIT 10'
            ]);
        return $response->json();
    }

    public function refreshAccessToken()
    {
        $refreshToken = session('refresh_token');
        $response = Http::asForm()->post(
            env('SF_LOGIN_URL') . '/services/oauth2/token',
            [
                'grant_type' => 'refresh_token',
                'client_id' => env('SF_CONSUMER_KEY'),
                'client_secret' => env(''),
            ]
        );
    }
}

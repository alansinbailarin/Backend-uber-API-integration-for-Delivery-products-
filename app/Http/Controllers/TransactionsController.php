<?php

namespace App\Http\Controllers;

use App\Models\QuoteURL;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class TransactionsController extends Controller
{
    public function createQuote(Request $request)
    {
        $customer_id = env('UBER_ORGANIZATION_ID');

        $url = env('UBER_API_URL') . 'v1/customers/' . $customer_id . '/delivery_quotes';

        $access_token = env('UBER_ACCESS_TOKEN');

        $params = [
            'pickup_address' => $request->pickup_address,
            'dropoff_address' => $request->dropoff_address,
            'pickup_latitude' => $request->pickup_latitude,
            'pickup_longitude' => $request->pickup_longitude,
            'dropoff_latitude' => $request->dropoff_latitude,
            'dropoff_longitude' => $request->dropoff_longitude,
            'pickup_ready_dt' => $request->pickup_ready_dt,
            'pickup_deadline_dt' => $request->pickup_deadline_dt,
            'dropoff_ready_dt' => $request->dropoff_ready_dt,
            'dropoff_deadline_dt' => $request->dropoff_deadline_dt,
            'pickup_phone_number' => $request->pickup_phone_number,
            'dropoff_phone_number' => $request->dropoff_phone_number,
            'manifest_total_value' => $request->manifest_total_value,
            'external_store_id' => $request->external_store_id,
        ];

        $client = new Client();

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $access_token,
                ],
                'json' => $params,
            ]);

            $result = json_decode($response->getBody(), true);

            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function createQuoteLink($lang, $customer_uuid)
    {
        $accessToken = $this->createAccessToken();
        $expiration = Carbon::now()->addMinute();

        $user = User::where('uuid', $customer_uuid)->first();

        if (!$user) {
            return response()->json(['error' => 'User It is not associated with any UUID'], 404);
        }

        $url = new QuoteURL([
            'customer_uuid' => $customer_uuid,
            'access_token' => $accessToken,
            'expires_at' => $expiration,
        ]);

        $url->expires_at_local = Carbon::parse($url->expires_at)->setTimezone(config('app.timezone'))->toDateTimeString();

        $url->save();

        $link = URL::temporarySignedRoute(
            'quote',
            $expiration,
            [
                'customer_uuid' => $customer_uuid,
                'access_token' => $accessToken,
            ]
        );

        $showVerifyUrlApiInfo = false;

        if ($showVerifyUrlApiInfo == true) {
            $verifyURL = $link;
        } else {
            if (env('APP_ENV') == 'local') {
                $verifyURL = str_replace('http://127.0.0.1:8000/api', env('FRONTEND_URL_DEV') . '/' . $lang . '/verify', $link);
            } else {
                $verifyURL = str_replace('http://127.0.0.1:8000/api', env('FRONTEND_URL_PROD') . '/' . $lang . '/verify', $link);
            }
        }

        return response()->json([
            'success' => true,
            'access_token' => $accessToken,
            'expiration' => $expiration,
            'url' => $url,
            'link' => $verifyURL,
        ]);
    }

    public function createAccessToken()
    {
        return strtoupper(md5(Carbon::now()->timestamp));
    }
}

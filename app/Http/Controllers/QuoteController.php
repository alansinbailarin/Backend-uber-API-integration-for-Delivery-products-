<?php

namespace App\Http\Controllers;

use App\Models\QuoteURL;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function getQuote($customer_uuid, $access_token)
    {
        $quote = QuoteURL::where('customer_uuid', $customer_uuid)
            ->where('access_token', $access_token)
            ->first();

        if (!$quote) {
            return response()->json([
                'success' => false,
                'data' => 'Quote not found',
            ]);
        }

        if ($quote->expires_at < now()) {
            return response()->json([
                'success' => false,
                'data' => 'Quote expired',
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $quote,
        ]);
    }
}

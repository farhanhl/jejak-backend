<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class AnalyticsController extends Controller
{
    public function getAnalytic(Request $request)
    {
        try {
            $apiYearly = env('QCOUNT_BASEURL') 
                        . "?apikey=" 
                        . env('JIS_UNDER_EAST_RAMP_API_KEY') 
                        . '&action=taglogyear&year=2024&distribution=0';

            $apiMonthly = env('QCOUNT_BASEURL') 
                        . "?apikey=" 
                        . env('JIS_UNDER_EAST_RAMP_API_KEY') 
                        . '&action=taglogmonth&year=2024&month=12&day_start=1&day_end=31';

            $apiDaily = env('QCOUNT_BASEURL') 
                        . "?apikey=" . env('JIS_UNDER_EAST_RAMP_API_KEY') 
                        . '&action=taglogday&year=2024&distribution=0';
            // $response = Http::get($apiUrl);
            // return response($response->body(), $response->status());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class UserController extends Controller
{
    public function location(Request $request)
    {
        $ip = $request->post('ip');

        $userInfo = Location::get($ip);
        return response()->json([
            'success' => true,
            'data' => [
                    $ip,
                    $userInfo->countryName,
                    $userInfo->countryCode,
                    $userInfo->regionCode,
                    $userInfo->regionName,
                    $userInfo->cityName,
                    $userInfo->latitude,
                    $userInfo->longitude,
            ]
        ]);
    }

}

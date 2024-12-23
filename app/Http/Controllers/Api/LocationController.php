<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getLocation()
    {
        return response()->json([
            'latitude' => '-7.969087880228027',
            'longitude' => '112.64886393863685',
            'alamat' => '2JHX+XJF, Jl. Warinoi III, Bunulrejo, Kec. Blimbing, Kota Malang, Jawa Timur 65123',
            'telepon' => '0341415365'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Offers;
use Illuminate\Http\Request;

class TrafficController extends Controller
{
    public function index(Request $request)
    {
        $all = $request->query->all();
        foreach ($all as $item => $key)
        {
            $data = Offers::where('deeplink', '=', $item.'='.$key)->first();
        }

        if(!$data){
            return 'Error: Not Found Record';
        }
        return view('traffic', compact('data'));
    }
}

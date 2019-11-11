<?php

namespace App\Http\Controllers;

use App\Offers;
use App\Raw;
use Illuminate\Http\Request;

class RawController extends Controller
{
    public function index(Request $request)
    {
        $body = $request->all();

        $raws = new Raw();
        $raws->body = json_encode($body);
        $raws->save();

        return "htts://google.com";
    }
}

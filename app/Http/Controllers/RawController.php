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
        if( $body == array() )
        {
            abort(400);
        } else {
            $raws = new Raw();
            $raws->body = json_encode($body);
            $raws->save();

            $data = json_decode($raws->body, true);

            if( $data['Param'] == 'null')
            {
                echo null;
            }else{
                $exp = explode("_", $data['Param']);
                $country = \App\Countries::where('code','=',$data['CountryCode'])->first()->id;

                $data = Offers::where('application_id', '=', $exp[0])->where('user_id', '=', $exp[1])->where('countries_id','like', '%'.$country.'%')->first();
                if( $data != null)
                {
                    echo $data->url;
                }else{
                    echo null;
                }
            }

        }
    }
}

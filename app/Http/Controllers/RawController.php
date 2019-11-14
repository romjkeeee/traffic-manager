<?php

namespace App\Http\Controllers;

use App\Countries;
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
                if( count($exp) != 2)
                {
                    $country = Countries::where('code','=',$data['CountryCode'])->first()->id;

                    $data = Offers::where('application_id', '=', $exp[0])->where('user_id', '=', $exp[1])->where('countries_id','like', '%'.$country.'%')->first();
                    if( $data != null)
                    {
                        echo $data->url;
                    }else{
                        echo null;
                    }
                }elseif(count($exp) != 3){
                    $country = Countries::where('code','=',$data['CountryCode'])->first()->id;

                    $data = Offers::where('application_id', '=', $exp[0])->where('user_id', '=', $exp[1])->where('countries_id','like', '%'.$country.'%')->where('add_param',$exp[2])->first();
                    if( $data != null)
                    {
                        echo $data->url;
                    }else{
                        echo null;
                    }
                }else{
                    echo null;
                }
            }

        }
    }
}

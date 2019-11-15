<?php

namespace App\Http\Controllers;

use App\Application;
use App\Countries;
use App\Offers;
use App\Organisation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'SuperAdmin') {
            $data = Offers::with('user')->get();
        }else{
            $data = Offers::with('user')->where('organisation_id', '=', $user->organisation_id)->get();
        }
        $countries = Countries::all();

        $organisation = Organisation::all();

        return view('pages.offers.index', compact('data', 'countries', 'organisation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Auth::user();
        if($users->role == 'SuperAdmin') {
            $app = Application::get()->pluck('name', 'id');
            $countries = Countries::all();
            $user = User::get()->pluck('email', 'id');

            return view('pages.offers.create', compact('app', 'countries', 'user'));
        }elseif($users->role == 'Admin' || $users->role == 'Webmaster'){
            $app = Application::where('organisation_id','=',$users->organisation_id)->get()->pluck('name', 'id');
            $countries = Countries::all();
            $user = User::where('organisation_id','=',$users->organisation_id)->get()->pluck('email', 'id');

            return view('pages.offers.create', compact('app', 'countries', 'user'));
        }else{
            return view('layouts.404');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $deep_link = new Offers();
            $data = [
                'url' => $request->url,
                'countries_id' => json_encode($request->countries_id),
                'application_id' => $request->application_id,
                'user_id' => $request->user_id,
                'comment' => $request->comment,
                'add_param' => $request->add_param
            ];
        if($user->role != 'SuperAdmin') {
                $deep_link->organisation_id = $user->organisation_id;
        }
            $deep_link->save($data);

        if($request->application_id) {
            $user_app = Application::where('id','=',$request->application_id)->first();
            if(  ($deep_link->add_param != null ) || ($deep_link->add_param != 0 ) )
            {
                $deep_link->deeplink = $user_app->link_android . '&param=' . $request->application_id.'_'.$request->user_id.'_'.$deep_link->add_param;
            }else{
                $deep_link->deeplink = $user_app->link_android . '&param=' . $request->application_id.'_'.$request->user_id;
            }
            $deep_link->update($data);
        }
        return redirect()->route('offers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function show(Offers $offer)
    {
        $countries = Countries::all();

        $data = $offer;
        return view('pages.offers.show', compact('data', 'countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function edit(Offers $offer)
    {
        $user = Auth::user();
        if($user->role == 'SuperAdmin') {
            $app = Application::get()->pluck('name', 'id');
            $countries = Countries::All();
            $user = User::get()->pluck('email', 'id');
            $data = $offer;
        }elseif($user->role == 'Webmaster'){
            $app = Application::where('organisation_id','=',$user->organisation_id)->get()->pluck('name', 'id');
            $countries = Countries::All();
            $user = User::where('organisation_id','=',$user->organisation_id)->get()->pluck('email', 'id');
            $data = $offer;
        }
        return view('pages.offers.edit', compact('data', 'app', 'countries', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offers $offer)
    {

        $app = Application::get()->pluck('name', 'id');

        $countries = Countries::All();

        $user = User::get()->pluck('email', 'id');

        $data = [
            'id' => $request->id,
            'url' => $request->url,
            'countries_id' => json_encode($request->countries_id),
            'application_id' => $request->application_id,
            'user_id' => $request->user_id,
            'comment' => $request->comment,
            'add_param' => $request->add_param
        ];
        $offer->update($data);

        if($request->application_id) {
            $user_app = Application::where('id','=',$request->application_id)->first();

            if( ( $offer->add_param != null ) || ($offer->add_param != 0 ) )
            {
                $offer->deeplink = $user_app->link_android . '&param=' . $request->application_id.'_'.$request->user_id.'_'.$offer->add_param;
            }else{
                $offer->deeplink = $user_app->link_android . '&param=' . $request->application_id.'_'.$request->user_id;
            }

            $offer->update($data);
        }

        $data = Offers::all();
        return view('pages.offers.index', compact('data', 'countries'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offers $offer)
    {
        //
    }
}

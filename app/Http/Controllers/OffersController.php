<?php

namespace App\Http\Controllers;

use App\Application;
use App\Countries;
use App\Offers;
use App\User;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Offers::with('user')->get();

        $countries = Countries::all();

        return view('pages.offers.index', compact('data', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $app = Application::get()->pluck('name', 'id');

        $countries = Countries::all();

        $user = User::get()->pluck('email', 'id');

        return view('pages.offers.create', compact('app', 'countries', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countries = Countries::all();

        $deep_link = new Offers();
            $data = [
                'url' => $request->url,
                'countries_id' => json_encode($request->countries_id),
                'application_id' => $request->application_id,
                'user_id' => $request->user_id,
                'comment' => $request->comment,
            ];
        $deep_link->save($data);

        if($request->application_id) {
            $user_app = Application::where('id','=',$request->application_id)->first();
            $deep_link->deeplink = $user_app->link_android . '&param=' . $deep_link->id;

            $deep_link->update($data);
        }

        $data = Offers::all();
        return view('pages.offers.index', compact('data','countries'));
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
        $app = Application::get()->pluck('name', 'id');

        $countries = Countries::All();

        $user = User::get()->pluck('email', 'id');

        $data = $offer;

        return view('pages.offers.edit', compact('data','app', 'countries', 'user'));
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
        ];
        $offer->update($data);

        if($request->application_id) {
            $user_app = Application::where('id','=',$request->application_id)->first();
            $offer->deeplink = $user_app->link_android . '&param=' . $offer->id;

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

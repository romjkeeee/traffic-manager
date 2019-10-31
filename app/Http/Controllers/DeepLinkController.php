<?php

namespace App\Http\Controllers;

use App\Application;
use App\Deep_link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeepLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Auth::user()->deeplink;

        return view('pages.deep_link.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $app = Application::get()->pluck('name', 'id');

        $offer = Application::get()->pluck('name', 'id');

        return view('pages.deep_link.create', compact('app', 'offer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deep_link = new Deep_link;
        $deep_link->fill($request->all());
        $deep_link->user_id = Auth::user()->id;
        $deep_link->save();

        $data = Auth::user()->deeplink;

        return view('pages.deep_link.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deep_link  $deep_link
     * @return \Illuminate\Http\Response
     */
    public function show(Deep_link $deep_link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deep_link  $deep_link
     * @return \Illuminate\Http\Response
     */
    public function edit(Deep_link $deep_link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deep_link  $deep_link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deep_link $deep_link)
    {
        $alldata = $request->all();

        $deep_link->update($alldata);

        $data = Auth::user()->deeplink;
        return view('pages.deep_link.index', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deep_link  $deep_link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deep_link $deep_link)
    {
        //
    }
}

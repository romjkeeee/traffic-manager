<?php

namespace App\Http\Controllers;

use App\Application;
use App\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
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
            $data = Application::all();
        }else{
            $data = Application::where('organisation_id', '=', $user->organisation_id)->get();
        }

        $organisation = Organisation::all();

        return view('pages.application.index', compact('data', 'organisation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->role == 'SuperAdmin' || $user->role == 'Admin' || $user->role == 'Webmaster') {
            $organisation = Organisation::get()->pluck('name', 'id');
            return view('pages.application.create',compact('organisation'));
        } elseif ($user->role == 'Admin' || $user->role == 'Webmaster'){
            return view('pages.application.create');
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
        $application = Application::create($request->all());
        if($user->role != 'SuperAdmin') {
            $application->organisation_id = Auth::user()->organisation_id;
            $application->update();
        }

        return redirect()->route('application.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
        $data = $application;
        return view('pages.application.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $user = Auth::user();
        $data = $application;
        if($user->role == 'SuperAdmin') {
            $organisation = Organisation::get()->pluck('name', 'id');
            return view('pages.application.edit', compact('data', 'organisation'));
        }
        return view('pages.application.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $user = Auth::user();
        $alldata = $request->all();
        if($user->role != 'SuperAdmin') {
            $application->organisation_id = Auth::user()->organisation_id;
        }
        $application->update($alldata);
        return redirect()->route('application.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('application.index');
    }

    public function copy($id)
    {
        $user = Auth::user();
        $data = Application::where('id','=',$id)->first();
        if($user->role == 'SuperAdmin') {
            $organisation = Organisation::get()->pluck('name', 'id');
            return view('pages.application.copy', compact('data', 'organisation'));
        }
        return view('pages.application.copy', compact('data'));
    }
}

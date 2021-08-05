<?php

namespace App\Http\Controllers;

use App\Organisation;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
            $data = User::all();
        }elseif($user->role == 'Webmaster'){
            return view('layouts.404');
        }else{
            $data = User::where('organisation_id','=',$user->organisation_id)->get();
        }
        $org = Organisation::all();

        return view('pages.users.index', compact('data','org'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->role == 'SuperAdmin') {
            $organisation = Organisation::all();

            return view('pages.users.create', compact('organisation'));
        }elseif($user->role == 'Admin'){
            return view('pages.users.create');
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
        $data = $request->all();
        $users = Auth::user();
        $user = new User();
        $user->name = $data['name'];
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];
        $user->role = $data['role'];
        if($users->role == 'SuperAdmin') {
            $user->organisation_id = $data['organisation_id'];
        }else{
            $user->organisation_id = $users->organisation_id;
        }
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $data = $user;
        return view('pages.users.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data = $user;

        $organisation = Organisation::get()->pluck('name', 'id');

        return view('pages.users.edit', compact('data', 'organisation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $alldata = $request->all();

        $user->update($alldata);
        if (!empty($alldata['password'])){
            $user->password = Hash::make($alldata['password']);
            $user->update();
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

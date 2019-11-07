<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();

        return view('pages.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.create');
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

        $users = new User();

        $users->create($data);

        $data = $users->all();

        return view('pages.users.index', compact('data'));
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

        $roles = Role::get()->pluck('name', 'id');


        return view('pages.users.edit', compact('data', 'roles'));
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
        $data = User::all();

        return view('pages.users.index', compact('data'));
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

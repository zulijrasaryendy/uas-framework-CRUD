<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => 'required|max:255',
            "username" => 'required|unique:users',
            "email" => 'required|email:dns|unique:users',
            "password" => 'required|max:255',
            "role" => 'required',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['is_admin'] = $validatedData["role"];
        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'Registration successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            "name" => 'required|max:255',
            "username" => 'required|unique:users,username,'.$user->id,
            "email" => 'required|email:dns|unique:users,email,'.$user->id,
            "password" => 'required|max:255',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['is_admin'] = $request->role;
        User::where("id", $user->id)->update($validatedData);
        return redirect('/dashboard/users')->with('success', 'Registration successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

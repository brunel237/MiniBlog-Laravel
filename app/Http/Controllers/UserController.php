<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        // return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(StoreUserRequest $request)
    {
        // //dd($request->input('first_name'));
        // $u = User::create([
        //     'first_name'=>$request->input('first_name'),
        //     'last_name'=>$request->input('last_name'),
        //     'email'=>$request->input('email'),
        //     'password'=>bcrypt($request->input('password'))
        // ]);
        // $u->save();

        // return redirect()->route('dashbord');
    }

    /**
     * Display the specified resource.
     *
     *
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.profile', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     */
    public function edit($id)
    {
        return view('user.edit', );
    }

    /**
     * Update the specified resource in storage.
     *
     *
     */
    public function update(UpdateUserRequest $request, $id)
    {
        User::find($id)->update([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'email'=>$request->input('email'),
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy($id)
    {
        User::find($id)->destroy();
        return redirect()->intended('logout');
    }
}

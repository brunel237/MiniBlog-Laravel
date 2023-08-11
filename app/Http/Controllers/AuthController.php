<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        if ($request->authentication()){

            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        else
            return back()->withErrors(['email'=>'INVALID CREDENTIALS']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function pass_edit(){
        return view('auth.pass_edit');
    }
    public function pass_update(Request $request){
        $this->validate($request,[
            'password'=>'required|min:6|confirmed',
            'pwd'=>'required|min:6'
        ]);



        // $response = $this->broker()->reset(
        //     $this->credentials($request), function($user, $password){
        //         $this->resetPassword($user, $password);
        //     }
        // );

        if (Hash::check($request->input('pwd'), auth()->user()->getAuthPassword())){
            User::find(auth()->user()->id)->update([
                'password'=> bcrypt($request->input('password'))
            ]);
            Auth::logout();
            return redirect()->route('login');
        }
        else{
            dd('false');
            return back()->withErrors(['password'=>'Mismatching Password']);
        }

        // if (auth()->user()->getAuthPassword() == $credentials['pwd']){
        //     dd('true');
        //     User::find(auth()->user()->id)->update([
        //         'password'=> $request->input('password')
        //     ]);
        //     Auth::logout();
        //     return redirect()->route('login');
        // }
    }
    public function register(StoreUserRequest $request){

        $u = User::create([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password'))
        ]);
        $u->save();

        Auth::login($u);

        return redirect()->route('dashboard', ['user'=>$u]);
    }

}

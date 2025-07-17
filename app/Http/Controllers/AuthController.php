<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showSignUp(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    public function showFormLogin(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['Email'=>'Email ou mot de passe incorrect']);
    }

    public function signUp(Request $request){
        $request->validate([
            'name'=>'required|string|min:3|max:100',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:8|confirmed'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return back()->with('success','Inscription avec succées.');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}

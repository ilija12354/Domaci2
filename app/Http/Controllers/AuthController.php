<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function signin(Request $request)
    {
       $request->validate([
            'email'=> 'required',
            'password'=>'required'

       ]);
       if(Auth::attempt([
           'email'=>$request->email,
           'password'=>$request->password
       ]))
       {
           $user = Auth::user();
           $token = $user->createToken('authToken');
           $cookie = Cookie::make('token', $token->plainTextToken);
           return redirect()->route('viewPorudzbine')->withCookies([$cookie]);
       }
       return redirect()->back()->with('danger','Login incorect');
    }
    public function logout(Request $request)
    {   
        Cookie::forget('token');
        $user = $request->user();
        $user->tokens()->delete();        
        Auth::logout();
        return redirect()->route('login');
    }
}

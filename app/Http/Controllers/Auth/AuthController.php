<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Helpers\AuditTrail;
use Illuminate\Http\Request\hasRole;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            $request->session()->regenerate();
     
            return redirect()->route('dashboard');
        }
        return redirect('/login')->withErrors([
            'username' => 'Password atau Username anda salah!',
        ]);
    }

    protected function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

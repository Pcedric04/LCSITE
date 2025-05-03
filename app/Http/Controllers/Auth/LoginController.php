<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('web')->except('logout');
    }

    public function logout(Request $request)
        {
            Session::flush();
                $request->session()->invalidate();
                    $request->session()->regenerateToken();
                Auth::logout();
            return redirect()->route('home')->with('error',"Vous êtes déconnecté(e)!");
        }

        public function showLoginForm()
{
    return view('auth.login');
}

public function login(Request $request)
{
    // Logique de connexion ici
}

}

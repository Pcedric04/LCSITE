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

    public function index(){

    return view('connexion');
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
            $this->validate($request, [
                'nickname' => 'required|string',
                'password' => 'required|min:4|max:60',
                ]);
                $input = $request->all();
                if (Auth::attempt(['nickname' => $input['nickname'], 'password' => $input['password']]))
                    {
                        return redirect()->route('labo.back.index')->with('success',"Bienvenu sur le site du Laboratoire Citoyennetés");
                    }
                    else
                   {
                        return redirect()->back()->with('error',"Nous vous prions de bien vouloir vérifier votre nom d\'utilisateur ou votre mot de passe!");
                   }
        }

}

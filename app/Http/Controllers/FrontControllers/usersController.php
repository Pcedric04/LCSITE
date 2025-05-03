<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\flashinfos;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class usersController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware(['web']);
    }
    public function index()
        {
            $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
            $post_all = DB::table('posts')->orderByDesc('id')->paginate(3);
            $agendas = agendas::where('status','=','En ligne')->orderByDesc('agendas.id')->paginate(3);
            $postsall1 = DB::table('posts')->orderByDesc('id')
        ->select(
            'posts.id',
            'posts.photoIllustration',
            'posts.titre',
            DB::raw("date_format(posts.created_at,'%d-%m-%y') as created_at"),
        )
        ->paginate(3);
           return view('Layouts.LayoutsFrontApp.Users.Login.login',compact('message','post_all','agendas','postsall1'));
        }

    public function login(Request $request)
        {
            $this->validate($request, [
                'nickname' => 'required|string',
                'password' => 'required|min:4|max:10',
                ]);
                $input = $request->all();

                if (Auth::attempt(['nickname' => $input['nickname'], 'password' => $input['password']]) && Auth::user()->hasRole('visiteur'))
                    {
                        return redirect()->route('labo.index')->with('success',"Bienvenu sur le site du Laboratoire Citoyennetés");
                    }
                    else
                   {
                        return redirect()->back()->with('error',"Nous vous prions de bien vouloir vérifier votre nom d\'utilisateur ou votre mot de passe!");
                   }
        }
    public function register()
        {
            $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
            $postsall1 = DB::table('posts')->orderByDesc('id')
        ->select(
            'posts.id',
            'posts.photoIllustration',
            'posts.titre',
            DB::raw("date_format(posts.created_at,'%d-%m-%y') as created_at"),
        )
        ->paginate(3);
           return view('Layouts.LayoutsFrontApp.Users.Login.register',compact('message','postsall1'));
        }

    public function logout(Request $request)
        {
            Session::flush();
                $request->session()->invalidate();
                    $request->session()->regenerateToken();
                Auth::logout();
            return redirect()->route('labo.index')->with('error',"A très bientôt sur le site du Laboratoire Citoyennetés");
        }
    public function profil ()
        {
            $user = Auth::user();
            $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
            return view('Layouts.LayoutsFrontApp.Users.Profil.profil',compact('user','message'));
        }
    public function cookies()
        {
            $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
            return view('Layouts.LayoutsFrontApp.Cookies.cookies',compact('message'));
        }
}

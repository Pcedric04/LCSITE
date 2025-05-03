<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\agendas;
use App\Models\flashinfos;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class usersController extends Controller
{
    // Affiche la page de login
    public function index()
    {
        // Définir la variable $cookieConsentConfig si nécessaire
        $cookieConsentConfig = [
            'message' => 'Ce site utilise des cookies pour vous garantir la meilleure expérience.',
            'agree' => 'Accepter',
            'decline' => 'Refuser',
            'enabled' => true, // Si tu veux utiliser cette clé
            'cookie_name' => 'cookieConsent', // Nom du cookie
            'cookie_lifetime' => 365, // Durée de vie du cookie (en jours)
        ];

        // Vérifier si l'utilisateur a déjà consenti aux cookies via la session ou un cookie
        $alreadyConsentedWithCookies = session('cookieConsent', false);  // false par défaut si non défini

        // Autres variables à passer à la vue
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

        // Passer les variables à la vue
        return view('Layouts.LayoutsFrontApp.Users.Login.login', compact('message', 'post_all', 'agendas', 'postsall1', 'cookieConsentConfig', 'alreadyConsentedWithCookies'));
    }

    // Gère la tentative de connexion
    public function login(Request $request)
    {
        // Validation des données
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4|max:50',
        ]);

        // Log la tentative de connexion
        Log::info('Tentative de connexion', ['email' => $request->email]);

        // Tentative de connexion
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('labo.index')->with('success', "Bienvenu sur le site du Laboratoire Citoyennetés");
        } else {
            Log::error('Échec de la connexion', ['email' => $request->email]);
            return redirect()->back()->with('error', "Nom d'utilisateur ou mot de passe incorrect !");
        }
    }

    // Affiche la page d'inscription
    public function register()
    {
        $message = flashinfos::where('status', 'En ligne')->orderByDesc('id')->get();

        // Vérifie que $postsall1 n'est pas null avant de passer à la vue
        $postsall1 = DB::table('posts')->orderByDesc('id')
            ->select(
                'posts.id',
                'posts.photoIllustration',
                'posts.titre',
                DB::raw("date_format(posts.created_at,'%d-%m-%y') as created_at"),
            )
            ->paginate(3);

        // Vérifie que $postsall1 est bien un tableau ou un objet
        if ($postsall1 == null) {
            $postsall1 = []; // On initialise un tableau vide si $postsall1 est null
        }

        return view('Layouts.LayoutsFrontApp.Users.Login.register', compact('message', 'postsall1'));
    }

    // Gère l'enregistrement de l'utilisateur
    public function store(Request $request)
{
    // Validation des données de l'inscription
    $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'nickname' => 'required|string|max:255|unique:users',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed', // Validation du mot de passe et confirmation
    ]);

    // Création de l'utilisateur
    $user = User::create([
        'name' => $request->name,
        'surname' => $request->surname,
        'nickname' => $request->nickname,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Hachage du mot de passe
    ]);

    // Optionnellement connecter l'utilisateur après l'inscription
    auth()->login($user);

    // Rediriger avec un message de succès
    return redirect()->route('labo.index')->with('success', 'Utilisateur créé avec succès, vous êtes maintenant connecté.');
}


    // Gère la déconnexion
    public function logout(Request $request)
    {
        Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        return redirect()->route('labo.index')->with('error', "A très bientôt sur le site du Laboratoire Citoyennetés");
    }

    // Affiche le profil de l'utilisateur connecté
    public function profil()
    {
        $user = Auth::user();  // Récupère l'utilisateur connecté
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        return view('Layouts.LayoutsFrontApp.Users.Profil.profil', compact('user', 'message'));
    }

    // Affiche la politique de confidentialité (cookies)
    public function cookies()
    {
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        return view('Layouts.LayoutsFrontApp.Cookies.cookies', compact('message'));
    }
}

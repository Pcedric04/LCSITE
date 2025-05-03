<?php


namespace App\Http\Controllers\BackControllers;

use App\Http\Controllers\Controller;
use App\Models\flashinfos;
use App\Models\Infos;
use App\Models\InfosFlash;
use App\Models\posts;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use Yajra\DataTables\DataTables;

class dashboardController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->where('roles.name','=','superadministrateur')
            ->get();
        $usersall = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->get();
        $articles = posts::get();
        $flash = flashinfos::get();
        $countArticles = $articles->count();
        $countUser = $usersall->count();
        $countFlash = $flash->count();
        $visitorCount = DB::table('posts')->sum('visits');
        return view('Layouts.LayoutsBackApp.Accueil.dash',
        ['countUser'=>$countUser,'countArticles'=>$countArticles,'countFlash'=>$countFlash,'visitorCount'=>$visitorCount]);
    }

}

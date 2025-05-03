<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\categories;
use App\Models\flashinfos;
use App\Models\Projet;
use App\Models\souscategories;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class projetsController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('web');
    }

    public function ddlpIndex()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $projets = DB::table('projets')
            ->join('souscategories','projets.souscategories_id','=','souscategories.id')
                ->select(
                    'projets.id',
                    'projets.name',
                    'projets.duree',
                    'projets.financer',
                    'projets.documents',
                    'projets.objectifs',
                    'projets.status',
                    'souscategories.name as sName',
                    DB::raw("date_format(projets.created_at,'%d-%M-%Y') as created_at")
                )
                ->where([['projets.status','=','En ligne'],['souscategories.name','like','%D.D.l.P%']])
                ->orderByDesc('projets.id')
            ->paginate(6);
        $postsall = DB::table('posts')->orderByDesc('id')
            ->select(
                'posts.id',
                'posts.photoIllustration',
                'posts.titre',
                DB::raw("date_format(posts.created_at,'%d-%m-%y') as created_at"),
            )
            ->paginate(3);
            $categories = categories::orderByDesc('id')->get();
            $souscategories = souscategories::orderByDesc('id')->get();
        return view('frontoffice.body.programme.decentralisation', compact('projets','message','agendas','postsall','categories','souscategories'));
    }

    public function EgouvernanceIndex()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $projets = DB::table('projets')
        ->join('souscategories','projets.souscategories_id','=','souscategories.id')
            ->select(
                'projets.id',
                'projets.name',
                'projets.duree',
                'projets.financer',
                'projets.documents',
                'projets.objectifs',
                'projets.status',
                'souscategories.name as sName',
                DB::raw("date_format(projets.created_at,'%d-%M-%Y') as created_at")
            )
            ->where([['projets.status','=','En ligne'],['souscategories.name','like','%E-gouvernance & Multimédia%']])
            ->orderByDesc('projets.id')
            ->paginate(6);
            $postsall = DB::table('posts')->orderByDesc('id')
            ->select(
                'posts.id',
                'posts.photoIllustration',
                'posts.titre',
                DB::raw("date_format(posts.created_at,'%d-%m-%y') as created_at"),
            )
            ->paginate(3);
            $categories = categories::orderByDesc('id')->get();
            $souscategories = souscategories::orderByDesc('id')->get();
        return view('frontoffice.body.programme.multimedia', compact('projets','message','agendas','postsall','categories','souscategories'));
    }
    public function EgouvernanceEcoIndex()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $projets = DB::table('projets')
        ->join('souscategories','projets.souscategories_id','=','souscategories.id')
            ->select(
                'projets.id',
                'projets.name',
                'projets.duree',
                'projets.financer',
                'projets.documents',
                'projets.objectifs',
                'projets.status',
                'souscategories.name as sName',
                DB::raw("date_format(projets.created_at,'%d-%M-%Y') as created_at")
            )
            ->where([['projets.status','=','En ligne'],['souscategories.name','like','%Gouvernance économique & financière%']])
            ->orderByDesc('projets.id')
            ->paginate(6);
            $postsall = DB::table('posts')->orderByDesc('id')
            ->select(
                'posts.id',
                'posts.photoIllustration',
                'posts.titre',
                DB::raw("date_format(posts.created_at,'%d-%m-%y') as created_at"),
            )
            ->paginate(3);
            $categories = categories::orderByDesc('id')->get();
            $souscategories = souscategories::orderByDesc('id')->get();
        return view('frontoffice.body.programme.financier', compact('projets','message','agendas','postsall','categories','souscategories'));
    }

    public function SecuriteIndex()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $projets = DB::table('projets')
            ->join('souscategories','projets.souscategories_id','=','souscategories.id')
                ->select(
                    'projets.id',
                    'projets.name',
                    'projets.duree',
                    'projets.financer',
                    'projets.documents',
                    'projets.objectifs',
                    'projets.status',
                    'souscategories.name as sName',
                    DB::raw("date_format(projets.created_at,'%d-%M-%Y') as created_at")
                )
                ->where([['projets.status','=','En ligne'],['souscategories.name','like','%Securité%']])
                ->orderByDesc('projets.id')
                ->paginate(6);
            $postsall = DB::table('posts')->orderByDesc('id')
                ->select(
                    'posts.id',
                    'posts.photoIllustration',
                    'posts.titre',
                    DB::raw("date_format(posts.created_at,'%d-%m-%y') as created_at"),
                )
                ->paginate(3);
            $categories = categories::orderByDesc('id')->get();
            $souscategories = souscategories::orderByDesc('id')->get();
            //dd($projets);
        return view('frontoffice.body.programme.securite', compact('projets','message','agendas','postsall','categories','souscategories'));
    }
    public function TransfontalierIndex()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $projets = DB::table('projets')
        ->join('souscategories','projets.souscategories_id','=','souscategories.id')
            ->select(
                'projets.id',
                'projets.name',
                'projets.duree',
                'projets.financer',
                'projets.documents',
                'projets.objectifs',
                'projets.status',
                'souscategories.name as sName',
                DB::raw("date_format(projets.created_at,'%d-%M-%Y') as created_at")
            )
            ->where([['projets.status','=','En ligne'],['souscategories.name','like','%Transfrontalier & Migration%']])
            ->orderByDesc('projets.id')
            ->paginate(6);
            $postsall = DB::table('posts')->orderByDesc('id')
            ->select(
                'posts.id',
                'posts.photoIllustration',
                'posts.titre',
                DB::raw("date_format(posts.created_at,'%d-%m-%y') as created_at"),
            )
            ->paginate(3);
            $categories = categories::orderByDesc('id')->get();
            $souscategories = souscategories::orderByDesc('id')->get();
        return view('frontoffice.body.programme.transfrontalier', compact('projets','message','agendas','postsall','categories','souscategories'));
    }
}

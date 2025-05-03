<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\categories;
use App\Models\flashinfos;
use App\Models\souscategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class accueilController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function flashinfos()
    {
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        return view('welcome', compact('message'));
    }
    public function MotBienvenuIndex()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('frontoffice.body.association.mot_bienvenue',compact('message','agendas','postsall','categories','souscategories'));
    }
    public function HistoriqueIndex()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('frontoffice.body.association.history',compact('message','agendas','postsall','categories','souscategories'));
    }
    public function DynamiqueIndex()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('frontoffice.body.association.dynamic',compact('message','agendas','postsall','categories','souscategories'));
    }
    public function OrganigrammeIndex()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('frontoffice.body.association.organigramme',compact('message','agendas','postsall','categories','souscategories'));
    }
    public function ConseilIndex()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('frontoffice.body.association.conseil',compact('message','agendas','postsall','categories','souscategories'));
    }
    /* public function DecentraliseIndex()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('frontoffice.body.programme.decentralisation',compact('message','agendas','postsall','categories','souscategories'));
    } */
    public function Axerecherche()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('frontoffice.body.axe.recherches',compact('message','agendas','postsall','categories','souscategories'));
    }
    public function Axefacilitation()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('frontoffice.body.axe.falicitation',compact('message','agendas','postsall','categories','souscategories'));
    }
    public function Axesuivi()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('frontoffice.body.axe.suivi',compact('message','agendas','postsall','categories','souscategories'));
    }
    public function ZoneBurkina()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('Layouts.LayoutsFrontApp.Zones.burkina',compact('message','agendas','postsall','categories','souscategories'));
    }
    public function ZoneBenin()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('Layouts.LayoutsFrontApp.Zones.benin',compact('message','agendas','postsall','categories','souscategories'));
    }
    public function ZoneNiger()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('Layouts.LayoutsFrontApp.Zones.niger',compact('message','agendas','postsall','categories','souscategories'));
    }
    public function Ressources()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('frontoffice.body.ressources.ressources',compact('message','agendas','postsall','categories','souscategories'));
    }

    public function PlaidoyerIndex()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('frontoffice.body.plaidoyer.plaidoyer',compact('message','agendas','postsall','categories','souscategories'));
    }

    public function contact()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
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
        return view('frontoffice.body.contact.contact',compact('message','agendas','postsall','categories','souscategories'));
    }

}

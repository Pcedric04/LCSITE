<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Models\agendas;
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
        return view('Layouts.LayoutsFrontApp.Decentralise.decentralise', ['projets' => $projets,'message'=>$message,'agendas'=>$agendas]);
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
            //dd($projets);
        return view('Layouts.LayoutsFrontApp.E-gouvernance.egouvernanceMultimedia', ['projets' => $projets,'message'=>$message,'agendas'=>$agendas]);
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
            //dd($projets);
        return view('Layouts.LayoutsFrontApp.E-gouvernance.egouvernanceEconomique', ['projets' => $projets,'message'=>$message,'agendas'=>$agendas]);
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
            //dd($projets);
        return view('Layouts.LayoutsFrontApp.E-gouvernance.securite', ['projets' => $projets,'message'=>$message,'agendas'=>$agendas]);
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
            //dd($projets);
        return view('Layouts.LayoutsFrontApp.E-gouvernance.tranfontalier', ['projets' => $projets,'message'=>$message,'agendas'=>$agendas]);
    }
}

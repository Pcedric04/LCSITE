<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\flashinfos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class capitalisationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function index()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $capitalisations = DB::table('capitalisations')
            ->select(
                'capitalisations.id',
                'capitalisations.titres',
                'capitalisations.numero',
                'capitalisations.auteurs',
                'capitalisations.documents',
                'capitalisations.status',
                DB::raw("date_format(capitalisations.created_at,'%d-%M-%Y') as created_at")
            )
            ->where('capitalisations.status','=','En ligne')
            ->orderByDesc('capitalisations.id')
            ->paginate(6);
        return view('Layouts.LayoutsFrontApp.Recherches.capitalisation', ['capitalisation' => $capitalisations,'message'=>$message,'agendas'=>$agendas]);
    }
}

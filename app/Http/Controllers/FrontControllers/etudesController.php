<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\flashinfos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class etudesController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function index()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $etudes = DB::table('etudes')
            ->select(
                'etudes.id',
                'etudes.titres',
                'etudes.numero',
                'etudes.auteurs',
                'etudes.documents',
                'etudes.status',
                DB::raw("date_format(etudes.created_at,'%d-%M-%Y') as created_at")
            )
            ->where('etudes.status','=','En ligne')
            ->orderByDesc('etudes.id')
            ->paginate(6);
        return view('Layouts.LayoutsFrontApp.Recherches.etude', ['etudes' => $etudes,'message'=>$message,'agendas'=>$agendas]);
    }
}

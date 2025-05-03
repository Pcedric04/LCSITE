<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\flashinfos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class fichesController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function index()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $fiches = DB::table('fiches')
            ->select(
                'fiches.id',
                'fiches.titres',
                'fiches.numero',
                'fiches.auteurs',
                'fiches.documents',
                'fiches.status',
                DB::raw("date_format(fiches.created_at,'%d-%M-%Y') as created_at")
            )
            ->where('fiches.status','=','En ligne')
            ->orderByDesc('fiches.id')
            ->paginate(6);
        return view('Layouts.LayoutsFrontApp.Recherches.outil', ['fiches' => $fiches,'message'=>$message,'agendas'=>$agendas]);
    }
}

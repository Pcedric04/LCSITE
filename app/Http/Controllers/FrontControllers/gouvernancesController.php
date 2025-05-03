<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\flashinfos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gouvernancesController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function index()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $gouvernances = DB::table('gouvernances')
            ->select(
                'gouvernances.id',
                'gouvernances.titres',
                'gouvernances.numero',
                'gouvernances.auteurs',
                'gouvernances.documents',
                'gouvernances.status',
                DB::raw("date_format(gouvernances.created_at,'%d-%M-%Y') as created_at")
            )
            ->where('gouvernances.status','=','En ligne')
            ->orderByDesc('gouvernances.id')
            ->paginate(6);
        return view('Layouts.LayoutsFrontApp.Recherches.citoyennete', ['gouvernances' => $gouvernances,'message'=>$message,'agendas'=>$agendas]);
    }
}

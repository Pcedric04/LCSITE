<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class agendaController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('agendas.id')->paginate(3);
        return view('Layouts.LayoutsFrontApp.Agenda.index',['agendas'=>$agendas]);
    }
}

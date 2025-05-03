<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\flashinfos;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class publicationsController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('web');
    }

    public function PublicationIndex()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $publications = DB::table('publications')
            ->select(
                'publications.id',
                'publications.couverture',
                'publications.name',
                'publications.pays',
                'publications.documents',
                'publications.status',
                DB::raw("date_format(publications.created_at,'%d-%M-%Y') as created_at")
            )
            ->where('publications.status','=','En ligne')
            ->orderByDesc('publications.id')
            ->paginate(6);
            return view('Layouts.LayoutsFrontApp.Publications.publications', ['publications' => $publications,'message'=>$message,'agendas'=>$agendas]);
    }
}

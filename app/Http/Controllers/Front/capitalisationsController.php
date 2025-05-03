<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\categories;
use App\Models\flashinfos;
use App\Models\souscategories;
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
        return view('frontoffice.body.recherche.capitalisation', Compact('capitalisations','message','agendas','postsall','categories','souscategories'));
    }
}

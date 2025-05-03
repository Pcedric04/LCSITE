<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\categories;
use App\Models\flashinfos;
use App\Models\souscategories;
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
        return view('frontoffice.body.recherche.outil', compact('fiches','message','agendas','postsall','categories','souscategories'));
    }
}

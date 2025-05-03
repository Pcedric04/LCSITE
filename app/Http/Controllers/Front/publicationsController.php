<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\categories;
use App\Models\flashinfos;
use App\Models\souscategories;
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
            return view('frontoffice.body.publication.publication', compact('publications','message','agendas','postsall','categories','souscategories'));
    }
}

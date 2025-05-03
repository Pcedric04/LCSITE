<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\categories;
use App\Models\posts;
use App\Models\souscategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function index(Request $request)
    {
        $query = $request->get('query');

        $posts = posts::where('titre', 'LIKE', '%' . $query . '%')
                      ->orWhere('contenus', 'LIKE', '%' . $query . '%')
                      ->get();
        $agendas = agendas::where('titre', 'LIKE', '%' . $query . '%')
                      ->orWhere('contenu', 'LIKE', '%' . $query . '%')
                      ->get();

        $postsall = posts::orderByDesc('posts.id')->paginate(3);
        $categories = categories::orderByDesc('id')->get();
        $souscategories = souscategories::orderByDesc('id')->get();
        return view('frontoffice.body.news.search_news',compact('posts','agendas','postsall','categories','souscategories'));
    }
}

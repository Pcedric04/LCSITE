<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\posts;
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
        return view('Layouts.LayoutsFrontApp.Search.resultat',compact('posts','agendas'));
    }
}

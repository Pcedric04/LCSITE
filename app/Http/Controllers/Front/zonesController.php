<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\categories;
use App\Models\flashinfos;
use App\Models\publications;
use App\Models\souscategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class zonesController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function ZoneBurkina()
    {

         $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $publications = publications::where('pays','like','%Burkina%')->orderByDesc('id')->latest()->first();
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
        return view('frontoffice.body.zone.burkina',compact('postsall','categories','souscategories','message','publications','agendas'));
    }
    public function ZoneBenin()
    {
         $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $publications = publications::where('pays','like','%Bénin%')->orderByDesc('id')->latest()->first();
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
        return view('frontoffice.body.zone.benin',compact('postsall','categories','souscategories','message','publications','agendas'));
    }
    public function ZoneNiger()
    {
         $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $publications = publications::where('pays','like','%Niger%')->orderByDesc('id')->latest()->first();
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
        return view('frontoffice.body.zone.niger',compact('postsall','categories','souscategories','message','publications','agendas'));
    }
}

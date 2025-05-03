<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\categories;
use App\Models\flashinfos;
use App\Models\posts;
use App\Models\souscategories;
use App\Models\videos;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class videosController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $videos = DB::table('videos')->where('status','=','En ligne')->orderByDesc('id')
        ->select(
            'videos.id',
            'videos.url',
            'videos.titre',
            'videos.status',
            DB::raw("date_format(videos.created_at,'%d-%m-%Y') as created_at"),
        )
        ->paginate(6);
        $postsall = posts::orderByDesc('posts.id')->paginate(3);
        $categories = categories::orderByDesc('id')->get();
        $souscategories = souscategories::orderByDesc('id')->get();
        return view('frontoffice.body.media.video', compact('videos','message','agendas','postsall','categories','souscategories'));
    }

    public function details($id)
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $videos = DB::table('videos')->where('id','=',$id)
        ->select(
            'videos.id',
            'videos.url',
            'videos.titre',
            'videos.status',
            'videos.description',
            DB::raw("date_format(videos.created_at,'%d-%M-%Y à %H:%i') as created_at"),
        )
        ->first();
        $postsall = posts::orderByDesc('posts.id')->paginate(3);
        $categories = categories::orderByDesc('id')->get();
        $souscategories = souscategories::orderByDesc('id')->get();
        return view('frontoffice.body.media.details.video',compact('postsall','videos','message','agendas','categories','souscategories'));
    }

}

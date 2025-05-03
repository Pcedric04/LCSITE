<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\flashinfos;
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
        return view('Layouts.LayoutsFrontApp.Medias.Videos', ['videos' => $videos,'message'=>$message,'agendas'=>$agendas]);
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
        $postsall1 = DB::table('posts')->orderByDesc('id')
        ->select(
            'posts.id',
            'posts.photoIllustration',
            'posts.titre',
            DB::raw("date_format(posts.created_at,'%d-%m-%y') as created_at"),
        )
        ->paginate(3);
        return view('Layouts.LayoutsFrontApp.Medias.detailsVideos',['postsall1'=>$postsall1,'videos'=>$videos,'message'=>$message,'agendas'=>$agendas]);
    }

}

<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\flashinfos;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class audiosController extends Controller
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
        $audios = DB::table('audios')->where('status','=','En ligne')->orderByDesc('id')
        ->select(
            'audios.id',
            'audios.url',
            'audios.titre',
            'audios.status',
            'audios.description',
            DB::raw("date_format(audios.created_at,'%d-%m-%Y') as created_at"),
        )
        ->paginate(6);
        return view('Layouts.LayoutsFrontApp.Medias.Audios', ['audios' => $audios, 'message'=>$message,'agendas'=>$agendas]);
    }

    public function details($id)
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status','=','En ligne')->orderByDesc('id')->get();
        $audios = DB::table('audios')->where('id','=',$id)
        ->select(
            'audios.id',
            'audios.url',
            'audios.titre',
            'audios.status',
            'audios.description',
            DB::raw("date_format(audios.created_at,'%d-%M-%Y %H:%i') as created_at"),
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
        return view('Layouts.LayoutsFrontApp.Medias.detailsAudios',['postsall1'=>$postsall1,'audios'=>$audios,'message'=>$message,'agendas'=>$agendas]);
    }

}

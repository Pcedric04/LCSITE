<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\albums;
use App\Models\flashinfos;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class photosController extends Controller
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
        $albums = DB::table('albums')->where('status','=','En ligne')->orderByDesc('id')
        ->select(
            'albums.id',
            'albums.logo',
            'albums.titre',
            'albums.status',
            DB::raw("date_format(albums.created_at,'%d-%m-%Y') as created_at"),
        )
        ->paginate(6);
        return view('Layouts.LayoutsFrontApp.Medias.Albums', ['albums' => $albums,'message'=>$message,'agendas'=>$agendas]);
    }

    public function details($id)
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status', '=', 'En ligne')->orderByDesc('id')->get();
        $photo_name = albums::where('id', '=', $id)->first();
        $photos = DB::table('photos')->where('photos.albums_id','=',$id)
        ->select(
            'photos.id',
            'photos.photo_name',
            DB::raw("date_format(photos.created_at,'%d-%M-%Y %H:%i') as created_at"),
        )
       ->get();
       $postsall1 = DB::table('posts')->orderByDesc('id')
       ->select(
           'posts.id',
           'posts.photoIllustration',
           'posts.titre',
           DB::raw("date_format(posts.created_at,'%d-%m-%y') as created_at"),
       )
       ->paginate(3);
       $albums = DB::table('albums')->where('id','=',$id)
       ->select(
           'albums.id',
           'albums.logo',
           'albums.titre',
           'albums.status',
           DB::raw("date_format(albums.created_at,'%d-%m-%Y') as created_at"),
       )
       ->first();
        return view('Layouts.LayoutsFrontApp.Medias.detailsAlbums',['albums' => $albums,'postsall1'=>$postsall1,'photos'=>$photos,'message'=>$message,'agendas'=>$agendas,'photo_name'=>$photo_name]);
    }
}

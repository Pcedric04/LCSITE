<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\albums;
use App\Models\categories;
use App\Models\flashinfos;
use App\Models\posts;
use App\Models\souscategories;
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
        $postsall = posts::orderByDesc('posts.id')->paginate(3);
        $categories = categories::orderByDesc('id')->get();
        $souscategories = souscategories::orderByDesc('id')->get();
        return view('frontoffice.body.media.album', compact('albums','message','agendas','postsall','categories','souscategories'));
    }

    public function details($id)
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status', '=', 'En ligne')->orderByDesc('id')->get();
        $photos_single = albums::where('id', '=', $id)->first();
        $photos = DB::table('photos')->where('photos.albums_id','=',$id)
        ->select(
            'photos.id',
            'photos.photo_name',
            DB::raw("date_format(photos.created_at,'%d-%M-%Y %H:%i') as created_at"),
        )
       ->get();
       /* $postsall1 = DB::table('posts')->orderByDesc('id')
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
       ->first(); */
        $postsall = posts::orderByDesc('posts.id')->paginate(3);
        $categories = categories::orderByDesc('id')->get();
        $souscategories = souscategories::orderByDesc('id')->get();
        return view('frontoffice.body.media.details.album',compact('postsall','categories','souscategories','photos','message','agendas','photos_single'));
    }
}

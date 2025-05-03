<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\carnet;
use App\Models\photosprofil;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class profilControllers extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $user_nickname = Auth::user()->nickname;
        $user_role_name = Auth::user()->roles()->pluck('name')->implode(', ');
        $posts = DB::table('posts')->join('users', 'users.id', '=', 'posts.users_id')
            ->select(
                'posts.id',
                'posts.photoIllustration',
                'posts.titre',
                'posts.contenus',
                DB::raw("date_format(posts.created_at,'le %d-%M-%Y à %h:%i:%s') as created_at"),
                'users.nickname'
            )
            ->where('users.nickname', '=', $user_nickname)
            ->get();
        $posts_online = DB::table('posts')->join('users', 'users.id', '=', 'posts.users_id')
            ->where([['users.nickname', '=', $user_nickname], ['posts.status', '=', 'En ligne']])
            ->get();
        $posts_offline = DB::table('posts')->join('users', 'users.id', '=', 'posts.users_id')
            ->where([['users.nickname', '=', $user_nickname], ['posts.status', '=', 'Hors ligne']])
            ->get();
        $posts_comments = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.users_id')
        ->where('users.nickname', '=', $user_nickname)->get(['posts.id']);
            $data = [];
                foreach ($posts_comments as $post) {
                    $comments = DB::table('comments')->where('post_id', $post->id)->get();
                    $data[] = [
                        'post' => $post,
                        'comments' => $comments,
                    ];
                }
        $carnets = DB::table('carnets')->where('users_id',$user_id)->first();
        $photo = DB::table('photosprofils')->where('users_id',Auth::user()->id)->first();
                if ($photo != null) {
                    $photo = $photo->titre;
                } else {
                    $photo = 'avatar.png';
                }
        return view('backoffice.body.Profil.profil', compact('carnets','photo','posts','data','posts_online', 'posts_offline'));
    }

    public function show($id)
    {
        $carnets = carnet::where('users_id',$id)->first();
        $photo = DB::table('photosprofils')->where('users_id',Auth::user()->id)->first();
                if ($photo != null) {
                    $photo = $photo->titre;
                } else {
                    $photo = 'avatar.png';
                }
        return view('backoffice.body.Profil.Modals.show',compact('photo','carnets'));
    }

    public function updateimages(Request $request,$id)
    {
        $photo = photosprofil::find($id);
        if($photo == null)
        {
            $validator = Validator::make($request->all(), [
                'img_profil'=> 'mimes:png,jpg,jpeg|max:20240',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 500);
            }
            $user = Auth::user()->id;
                $profil = new photosprofil();
                    if($request->hasFile('img_profil')){
                        $img_profil = $request->file('img_profil');
                            $img_profil1 = $img_profil->getClientOriginalName();
                            request()->img_profil->move(public_path('back/admin/profil'), $img_profil1);
                        $profil->titre = $img_profil1;
                    }
                $profil->users_id = $user;
            $profil->save();
        }
        else{
            $validator = Validator::make($request->all(), [
                'img_profil'=> 'mimes:png,jpg,jpeg|max:20240',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 500);
            }
            $user = Auth::user()->id;
                $profil = photosprofil::findOrfail($id);
                    if($request->hasFile('img_profil')){
                        $img_profil = $request->file('img_profil');
                            $img_profil1 = $img_profil->getClientOriginalName();
                            request()->img_profil->move(public_path('back/admin/profil'), $img_profil1);
                        $profil->titre = $img_profil1;
                    }
                $profil->users_id = $user;
            $profil->save();
        }
        return redirect()->back()->with('success','Profil mis a jour');
    }


    public function storecarnets(Request $request)
    {
                $validator = Validator::make($request->all(), [
                    'profession',
                    'adresse',
                    'competences',
                    'biographie'
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 500);
                }
                $user = Auth::user()->id;
                    $carnets = new carnet();
                        $carnets->profession = $request->profession;
                            $carnets->adresse = $request->adresse;
                            $carnets->competences = $request->competences;
                        $carnets->biographie = $request->biographie;
                    $carnets->users_id = $user;
                $carnets->save();

                return redirect()->back()->with('success','Informations mis à jour');
    }

    public function updatecarnets(Request $request,$id)
    {
                $validator = Validator::make($request->all(), [
                    'profession',
                    'adresse',
                    'competences',
                    'biographie'
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 500);
                }
                $user = Auth::user()->id;
                    $carnets = carnet::findOrFail($id);
                        $carnets->profession = $request->profession;
                            $carnets->adresse = $request->adresse;
                            $carnets->competences = $request->competences;
                        $carnets->biographie = $request->biographie;
                    $carnets->users_id = $user;
                $carnets->save();

                return redirect()->back()->with('success','Informations mis à jour');
    }
}

<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\flashinfos;
use App\Models\posts;
use App\Service\categoriesService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
class postsController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatables()
    {
        $user= Auth::user();
       if ($user->hasRole('superadministrateur') || $user->hasRole('administrateur')) {
            $posts = DB::table('posts')->join('categories','categories.id','=','posts.categories_id')
                ->join('users','users.id','=','posts.users_id')
                ->orderByDesc('id')
                ->select(
                    'posts.id',
                    'posts.photoIllustration',
                    'posts.titre',
                    'posts.contenus',
                    'posts.visits',
                    'posts.status',
                    'posts.deleted_at',
                    DB::raw("date_format(posts.created_at,'%d-%M-%Y') as created_at"),
                    'users.nickname'
                )
                ->where('posts.deleted_at',null)
                ->get();
        } else {
            $posts = DB::table('posts')->join('categories','categories.id','=','posts.categories_id')
                ->join('users','users.id','=','posts.users_id')
                ->orderByDesc('id')
                ->select(
                    'posts.id',
                    'posts.photoIllustration',
                    'posts.titre',
                    'posts.contenus',
                    'posts.visits',
                    'posts.status',
                    'posts.deleted_at',
                    DB::raw("date_format(posts.created_at,'%d-%M-%Y') as created_at"),
                    'users.nickname'
                )
                ->where([['posts.users_id','=',Auth::user()->id],['posts.deleted_at',null]])
                ->get();
        }

        return dataTables()->of($posts)->addColumn('actions', function ($posts) {
            return view('backoffice.body.Actualites.Actions.actions', ['posts' => $posts]);
        })->toJson();
    }

    public function restoredatatables()
            {
                $posts = DB::table('posts')->join('categories','categories.id','=','posts.categories_id')
                ->join('users','users.id','=','posts.users_id')
                ->orderByDesc('id')
                ->select(
                    'posts.id',
                    'posts.photoIllustration',
                    'posts.titre',
                    'posts.contenus',
                    'posts.visits',
                    'posts.status',
                    'posts.deleted_at',
                    DB::raw("date_format(posts.created_at,'%d-%M-%Y') as created_at"),
                    'users.nickname'
                )
                ->where('posts.deleted_at','!=',null)
                ->get();
                return dataTables()->of($posts)->addColumn('actions', function ($posts) {
                    return view('backoffice.body.Actualites.Actions.restoreactions', ['posts' => $posts]);
                })->toJson();
            }
        public function restoreindex()
            {
                $photo = DB::table('photosprofils')->where('users_id',Auth::user()->id)->first();
                if ($photo != null) {
                    $photo = $photo->titre;
                } else {
                    $photo = 'avatar.png';
                }
                return view('backoffice.body.Actualites.restore',compact('photo'));
            }
    public function index()
    {
        $photo = DB::table('photosprofils')->where('users_id',Auth::user()->id)->first();
                if ($photo != null) {
                    $photo = $photo->titre;
                } else {
                    $photo = 'avatar.png';
                }
        return view('backoffice.body.Actualites.index',compact('photo'));
    }

    public function create()
    {
        $categories = categories::all();
        $photo = DB::table('photosprofils')->where('users_id',Auth::user()->id)->first();
                if ($photo != null) {
                    $photo = $photo->titre;
                } else {
                    $photo = 'avatar.png';
                }
        return view('backoffice.body.Actualites.Modals.create',compact('categories','photo'));
    }
    public function random_souscategories($id)
    {
        $souscategories = categoriesService::souscategories($id);
        return view('backoffice.body.Videos.Partials.souscategories', compact('souscategories'));

    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required',
                'present'=> 'required|mimes:png,jpg,jpeg|max:20240',
                    'soustitre',
                    'contenu',
                'categories'=> 'required',
            'souscategories'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $user = Auth::user()->id;
        $posts = new posts();
        if($request->hasFile('present')){
            $present = $request->file('present');
                $present1 = $present->getClientOriginalName();
                request()->present->move(public_path('front/admin/articles'), $present1);
            $posts->photoIllustration = $present1;
        }
        $posts->titre = $request->titre;
            $posts->sousTitre = $request->soustitre;
                $posts->contenus = $request->contenu;
                    $posts->categories_id = $request->categories;
                $posts->souscategories_id = $request->souscategories;
            $posts->users_id = $user;
        $posts->save();
        return response()->json(['type' => 'success', 'message' => 'Article ajouté!']);
    }
    public function show($id)
        {
            $posts = posts::findOrfail($id);
            $categories = categories::all();
            return view('backoffice.body.Actualites.Modals.show',['posts'=>$posts,'categories'=>$categories]);
        }
    public function update(Request $request,$id)
        {
            $validator = Validator::make($request->all(), [
                'titre' => 'required',
                'soustitre',
                'contenu',
                'categories'=> 'required',
                'souscategories'=> 'required'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 500);
            }

            $user = Auth::user()->id;
                $posts = posts::findOrFail($id);
                $posts->titre = $request->titre;
                $posts->sousTitre = $request->soustitre;
                $posts->contenus = $request->contenu;
                $posts->categories_id = $request->categories;
                $posts->souscategories_id = $request->souscategories;
                $posts->users_id = $user;
            $posts->save();
            $photo = DB::table('photosprofils')->where('users_id',Auth::user()->id)->first();
                if ($photo != null) {
                    $photo = $photo->titre;
                } else {
                    $photo = 'avatar.png';
                }
            return view('backoffice.body.Actualites.index',compact('photo'))->with('success','Modifier avec succès');
        }
    public function delete($id)
    {
        $posts = posts::findOrFail($id);
        $posts->delete();
        return response()->json(['type' => 'success', 'message' => 'Article supprimé!']);
    }

    public function restore($id)
    {
        posts::withTrashed()->where('id', $id)->restore();
        return response()->json(['type' => 'success', 'message' => 'Article restauré!']);
    }

    public function forcedelete($id)
        {
            $posts = posts::withTrashed()->find($id);
            $posts->forceDelete();
            return response()->json(['type' => 'success', 'message' => 'Article supprimé définitivement!']);
        }
    public function status($id)
    {
        $posts = posts::find($id);
        if ($posts) {
            if ($posts->status == "En ligne") {
                $posts->status = "Hors ligne";
            } else {
                $posts->status = "En ligne";
            }
            $posts->save();
            return response()->json(['type' => 'success', 'message' => 'Succes']);
        }
        return view('backoffice.body.Actualites.index');
    }
}

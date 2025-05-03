<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\videos;
use App\Service\categoriesService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class videosController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function datatablesVideos()
    {
        $videos = DB::table('videos')
        ->join('categories','categories.id','=','videos.categories_id')
        ->join('users','users.id','=','videos.users_id')
        ->orderByDesc('videos.id')
        ->select(
            'videos.id',
            'videos.url',
            'videos.titre',
            'videos.status',
            DB::raw("date_format(videos.created_at,'%d-%M-%Y') as created_at"),
            'users.nickname'
        )
        ->get();
        return dataTables()->of($videos)->addColumn('actions', function ($videos) {
            return view('backoffice.body.Videos.Actions.actions', ['videos' => $videos]);
        })->toJson();
    }
    public function indexVideos()
    {
        $photo = DB::table('photosprofils')->where('users_id',Auth::user()->id)->first();
         if ($photo != null) {
            $photo = $photo->titre;
         } else {
            $photo = 'avatar.png';
         }
        return view('backoffice.body.Videos.index',compact('photo'));
    }

    public function createVideos()
    {
        $categories = categories::where('status', '=', 'En ligne')->get();
        return view('backoffice.body.Videos.Modals.create', ['categories' => $categories]);
    }

    public function random_souscategories($id)
    {
        $souscategories = categoriesService::souscategories($id);
        return view('backoffice.body.Videos.Partials.souscategories', ['souscategories'=>$souscategories]);

    }

    public function storeVideos(Request $request)
    {
        $validatedData = $request->validate([
            'titres' => 'required',
            'liens' => 'required|min:1',
            'description',
            'categories'=> 'required',
            'souscategories'=> 'required'
        ]);

        $user = Auth::user()->id;
            $videos = new videos();
            $videos->titre = $request->titres;
            $videos->url = $request->liens;
            $videos->description = $request->description;
            $videos->categories_id = $request->categories;
            $videos->souscategories_id = $request->souscategories;
            $videos->users_id = $user;
            $videos->save();
        return redirect()->route('labo.back.Videos.index')->with('success', 'Vidéos crée avec succès!');
    }

    public function showVideos($id)
    {
        $videos = videos::findOrfail($id);
        $categories = categories::where('status', '=', 'En ligne')->get();
        return view('backoffice.body.Videos.Modals.show', compact('videos','categories'));
    }

    public function updateVideos($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titres' => 'required',
            'liens' => 'required|min:1',
            'description',
            'categories',
            'souscategories'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }
        $user = Auth::user()->id;
        $videos = videos::findOrFail($id);
        $videos->titre = $request->titres;
        $videos->url = $request->liens;
        $videos->description = $request->description;
        $videos->categories_id = $request->categories;
        $videos->souscategories_id = $request->souscategories;
        $videos->users_id = $user;
        $videos->save();
        return view('backoffice.body.Videos.index');
    }
    public function deleteVideos($id)
    {
        $videos = videos::find($id);
        $videos->delete();
        return response()->json(['type' => 'success', 'message' => 'videos numéro ' . $videos->id . ' supprimé!']);
    }
    public function statusVideos($id)
    {

        $videos = videos::find($id);
        if ($videos) {
            if ($videos->status == "En ligne") {
                $videos->status = "Hors ligne";
            } else {
                $videos->status = "En ligne";
            }
        }
            $videos->save();
            return response()->json(['type' => 'success', 'message' => 'Succes']);
        }
}

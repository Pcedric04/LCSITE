<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\audios;
use App\Models\categories;
use App\Service\categoriesService;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class audiosController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
        {
            $this->middleware('auth');
        }
    public function datatablesAudios()
        {
            $audios = audios::with('categories')->with('users')->orderByDesc('id')->get();
            return dataTables()->of($audios)->addColumn('actions', function ($audios) {
                return view('backoffice.body.Audios.Actions.actions', ['audios' => $audios]);
            })->toJson();
        }
    public function indexAudios()
        {
            $photo = DB::table('photosprofils')->where('users_id',Auth::user()->id)->first();
         if ($photo != null) {
            $photo = $photo->titre;
         } else {
            $photo = 'avatar.png';
         }
            return view('backoffice.body.Audios.index',compact('photo'));
        }

    public function createAudios()
        {
            $categories = categories::where('status', '=', 'En ligne')->get();
            return view('backoffice.body.Audios.Modals.create',['categories'=>$categories]);
        }

    public function random_souscategories($id)
        {
            $souscategories = categoriesService::souscategories($id);
            return view('backoffice.body.Audios.Partials.souscategories', ['souscategories'=>$souscategories]);
        }
    public function storeAudios(Request $request)
        {
            $validatedData = $request->validate([
                'titres' => 'required',
                'liens' => 'required|min:1',
                'description',
                'categories'=> 'required',
                'souscategories'=> 'required'
            ]);
            $user = Auth::user()->id;
                $audios = new audios();
                $audios->titre = $request->titres;
                $audios->url = $request->liens;
                $audios->description = $request->description;
                $audios->categories_id = $request->categories;
                $audios->souscategories_id = $request->souscategories;
                $audios->users_id = $user;
                $audios->save();
            return redirect()->route('labo.back.audios.index')->with('success', 'Vidéos crée avec succès!');
        }
    public function showAudios($id)
        {
            $audios = audios::findOrfail($id);
            $categories = categories::where('status', '=', 'En ligne')->get();
            return view('backoffice.body.Audios.Modals.show', compact('audios','categories'));
        }

    public function updateAudios($id, Request $request)
        {
            $validator = Validator::make($request->all(), [
                'titres' => 'required',
                'liens' => 'required|min:1',
                'description',
                'categories'=> 'required',
                'souscategories'=> 'required'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 500);
            }
            $user = Auth::user()->id;
            $audios = audios::findOrFail($id);
            $audios->titre = $request->titres;
            $audios->url = $request->liens;
            $audios->description = $request->description;
            $audios->categories_id = $request->categories;
            $audios->souscategories_id = $request->souscategories;
            $audios->users_id = $user;
            $audios->save();
            return view('backoffice.body.Audios.index');
        }
    public function deleteAudios($id)
        {
            $audios = audios::find($id);
            $audios->delete();
            return response()->json(['type' => 'success', 'message' => 'audios numéro ' . $audios->id . ' supprimé!']);
        }
    public function statusAudios($id)
        {
            $audios = audios::find($id);
            if ($audios) {
                if ($audios->status == "En ligne") {
                    $audios->status = "Hors ligne";
                } else {
                    $audios->status = "En ligne";
                }
            }
                $audios->save();
            return response()->json(['type' => 'success', 'message' => 'Succes']);
        }
}

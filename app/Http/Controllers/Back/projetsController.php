<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Projet;
use App\Models\Region;
use App\Service\RegionService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class projetsController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
        {
            $this->middleware('auth');
        }
    public function datatables()
        {
            $projets = DB::table('projets')->join('users','users.id','=','projets.users_id')
            ->select(
                'projets.id',
                'projets.name',
                'projets.duree',
                'projets.financer',
                'projets.objectifs',
                'projets.documents',
                'projets.status',
                DB::raw("date_format(projets.created_at,'%d-%M-%Y') as created_at"),
                'users.nickname'
            )
            ->orderByDesc('projets.created_at')
            ->get();
            return dataTables()->of($projets)->addColumn('actions', function ($projets) {
                return view('backoffice.body.Projets.Actions.actions', ['projets' => $projets]);
            })->toJson();
        }
    public function index()
        {
            $photo = DB::table('photosprofils')->where('users_id',Auth::user()->id)->first();
         if ($photo != null) {
            $photo = $photo->titre;
         } else {
            $photo = 'avatar.png';
         }
            return view('backoffice.body.Projets.index',compact('photo'));
        }

    public function create()
        {
            $regions= Region::all();
            $categories = categories::all();
            return view('backoffice.body.Projets.Modals.create',['regions'=>$regions,'categories'=>$categories]);
        }
    public function random_provinces($id)
        {
            $provinces = RegionService::provinces($id);
            return view('backoffice.body.Projets.Partials.provinces', ['provinces'=>$provinces]);
        }
 public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required',
                'duree' => 'required',
                'financer' => 'required',
                'categories' => 'required',
                'souscategories' => 'required',
                'regions' => 'required',
                'provinces.*' => 'required',
                'contenu' => 'required',
                'documents'=> 'required|max:20240'
            ]);

            $user = Auth::user()->id;
                $projets = new Projet();
                $projets->name = $request->name;
                $projets->duree = $request->duree;
                $projets->financer = $request->financer;
                $projets->objectifs = $request->contenu;
                $projets->categories_id = $request->categories;
                $projets->souscategories_id = $request->souscategories;
                $projets->regions_id = $request->regions;
                if($request->hasFile('documents')){
                    $documents = $request->file('documents');
                    $documents1 = $documents->getClientOriginalName();
                    request()->documents->move(public_path('front/admin/pdf/projets'), $documents1);
                    $projets->documents = $documents1;
                }
                $projets->users_id = $user;
                $projets->save();
                $projets->provinces()->sync($validatedData['provinces']);
            return redirect()->route('labo.back.projets.index')->with('success', 'Projets crée avec succès!');
        }

     /*    public function show($id)
        {
            $projets = projet::findOrfail($id);
            return view('backoffice.body.Capitalisations.Modals.show', compact('capitalisations'));
        } */
        /*
    public function update($id, Request $request)
        {
            $validator = Validator::make($request->all(), [
                    'titres' => 'required|min:5',
                    'numero',
                    'auteurs',
                    'documents'
                ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 500);
            }
            $user = Auth::user()->id;
            $capitalisations = capitalisations::findOrFail($id);
            $capitalisations->titres = $request->titres;
            $capitalisations->numero = $request->numero;
            $capitalisations->auteurs = $request->auteurs;
            if($request->hasFile('documents')){
                $documents = $request->file('documents');
                $documents1 = $documents->getClientOriginalName();
                request()->documents->move(public_path('PDF/Rapport'), $documents1);
                $capitalisations->documents = $documents1;
            }
            $capitalisations->users_id = $user;
            $capitalisations->save();
            return view('backoffice.body.Capitalisations.index');
        }
        */
    public function delete($id)
        {
            $projets = projet::find($id);
            $projets->delete();
            return response()->json(['type' => 'success', 'message' => 'Projet numéro ' . $projets->id . ' supprimé!']);
        }
    public function status($id)
        {
            $projets = projet::find($id);
            if ($projets) {
                if ($projets->status == "En ligne") {
                    $projets->status = "Hors ligne";
                } else {
                    $projets->status = "En ligne";
                }
            }
                $projets->save();
            return response()->json(['type' => 'success', 'message' => 'Succes']);
        }
}

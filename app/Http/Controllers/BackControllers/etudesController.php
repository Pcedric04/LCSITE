<?php

namespace App\Http\Controllers\BackControllers;

use App\Http\Controllers\Controller;
use App\Models\etudes;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class etudesController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
        {
            $this->middleware('auth');
        }
    public function datatables()
        {
            $etudes = DB::table('etudes')->join('users','users.id','=','etudes.users_id')
            ->select(
                'etudes.id',
                'etudes.titres',
                'etudes.numero',
                'etudes.auteurs',
                'etudes.documents',
                'etudes.status',
                DB::raw("date_format(etudes.created_at,'%d-%M-%Y') as created_at"),
                'users.nickname'
            )
            ->orderByDesc('etudes.created_at')
            ->get();
            return dataTables()->of($etudes)->addColumn('actions', function ($etudes) {
                return view('Layouts.LayoutsBackApp.Etudes.Actions.actions', ['etudes' => $etudes]);
            })->toJson();
        }
    public function index()
        {
            return view('Layouts.LayoutsBackApp.Etudes.index');
        }

    public function create()
        {
            return view('Layouts.LayoutsBackApp.Etudes.Modals.create');
        }

    public function store(Request $request)
        {
            $validatedData = $request->validate([
                'titres' => 'required|min:5',
                'numero',
                'auteurs',
                'documents'=> 'required|mimes:pdf|max:20240'
            ]);

            $user = Auth::user()->id;
                $etudes = new etudes();
                $etudes->titres = $request->titres;
                $etudes->numero = $request->numero;
                $etudes->auteurs = $request->auteurs;
                if($request->hasFile('documents')){
                    $documents = $request->file('documents');
                    $documents1 = $documents->getClientOriginalName();
                    request()->documents->move(public_path('PDF/etudes'), $documents1);
                    $etudes->documents = $documents1;
                }
                $etudes->users_id = $user;
                $etudes->save();
            return redirect()->route('labo.back.etudes.index')->with('success', 'Publication crée avec succès!');
        }
    public function show($id)
        {
            $etudes = etudes::findOrfail($id);
            return view('Layouts.LayoutsBackApp.Etudes.Modals.show', compact('etudes'));
        }

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
            $etudes = etudes::findOrFail($id);
            $etudes->titres = $request->titres;
            $etudes->numero = $request->numero;
            $etudes->auteurs = $request->auteurs;
            if($request->hasFile('documents')){
                $documents = $request->file('documents');
                $documents1 = $documents->getClientOriginalName();
                request()->documents->move(public_path('PDF/etudes'), $documents1);
                $etudes->documents = $documents1;
            }
            $etudes->users_id = $user;
            $etudes->save();
            return view('Layouts.LayoutsBackApp.Etudes.index');
        }
    public function delete($id)
        {
            $etudes = etudes::find($id);
            $etudes->delete();
            return response()->json(['type' => 'success', 'message' => 'Publication numéro ' . $etudes->id . ' supprimé!']);
        }
    public function status($id)
        {
            $etudes = etudes::find($id);
            if ($etudes) {
                if ($etudes->status == "En ligne") {
                    $etudes->status = "Hors ligne";
                } else {
                    $etudes->status = "En ligne";
                }
            }
                $etudes->save();
            return response()->json(['type' => 'success', 'message' => 'Succès']);
        }
}

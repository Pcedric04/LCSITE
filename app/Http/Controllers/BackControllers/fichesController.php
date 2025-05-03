<?php

namespace App\Http\Controllers\BackControllers;

use App\Http\Controllers\Controller;
use App\Models\fiches;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class fichesController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
        {
            $this->middleware('auth');
        }
    public function datatables()
        {
            $fiches = DB::table('fiches')->join('users','users.id','=','fiches.users_id')
            ->select(
                'fiches.id',
                'fiches.titres',
                'fiches.numero',
                'fiches.auteurs',
                'fiches.documents',
                'fiches.status',
                DB::raw("date_format(fiches.created_at,'%d-%M-%Y') as created_at"),
                'users.nickname'
            )
            ->orderByDesc('fiches.created_at')
            ->get();
            return dataTables()->of($fiches)->addColumn('actions', function ($fiches) {
                return view('Layouts.LayoutsBackApp.Fiches.Actions.actions', ['fiches' => $fiches]);
            })->toJson();
        }
    public function index()
        {
            return view('Layouts.LayoutsBackApp.Fiches.index');
        }

    public function create()
        {
            return view('Layouts.LayoutsBackApp.Fiches.Modals.create');
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
                $fiches = new fiches();
                $fiches->titres = $request->titres;
                $fiches->numero = $request->numero;
                $fiches->auteurs = $request->auteurs;
                if($request->hasFile('documents')){
                    $documents = $request->file('documents');
                    $documents1 = $documents->getClientOriginalName();
                    request()->documents->move(public_path('PDF/fiches'), $documents1);
                    $fiches->documents = $documents1;
                }
                $fiches->users_id = $user;
                $fiches->save();
            return redirect()->route('labo.back.fiches.index')->with('success', 'Publication crée avec succès!');
        }
    public function show($id)
        {
            $fiches = fiches::findOrfail($id);
            return view('Layouts.LayoutsBackApp.Fiches.Modals.show', compact('fiches'));
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
            $fiches = fiches::findOrFail($id);
            $fiches->titres = $request->titres;
            $fiches->numero = $request->numero;
            $fiches->auteurs = $request->auteurs;
            if($request->hasFile('documents')){
                $documents = $request->file('documents');
                $documents1 = $documents->getClientOriginalName();
                request()->documents->move(public_path('PDF/fiches'), $documents1);
                $fiches->documents = $documents1;
            }
            $fiches->users_id = $user;
            $fiches->save();
            return view('Layouts.LayoutsBackApp.Fiches.index');
        }
    public function delete($id)
        {
            $fiches = fiches::find($id);
            $fiches->delete();
            return response()->json(['type' => 'success', 'message' => 'Publication numéro ' . $fiches->id . ' supprimé!']);
        }
    public function status($id)
        {
            $fiches = fiches::find($id);
            if ($fiches) {
                if ($fiches->status == "En ligne") {
                    $fiches->status = "Hors ligne";
                } else {
                    $fiches->status = "En ligne";
                }
            }
                $fiches->save();
            return response()->json(['type' => 'success', 'message' => 'Succès']);
        }
}

<?php

namespace App\Http\Controllers\BackControllers;

use App\Http\Controllers\Controller;
use App\Models\capitalisations;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class capitalisationsController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
        {
            $this->middleware('auth');
        }
    public function datatables()
        {
            $capitalisations = DB::table('capitalisations')->join('users','users.id','=','capitalisations.users_id')
            ->select(
                'capitalisations.id',
                'capitalisations.titres',
                'capitalisations.numero',
                'capitalisations.auteurs',
                'capitalisations.documents',
                'capitalisations.status',
                DB::raw("date_format(capitalisations.created_at,'%d-%M-%Y') as created_at"),
                'users.nickname'
            )
            ->orderByDesc('capitalisations.created_at')
            ->get();
            return dataTables()->of($capitalisations)->addColumn('actions', function ($capitalisations) {
                return view('Layouts.LayoutsBackApp.Capitalisations.Actions.actions', ['capitalisations' => $capitalisations]);
            })->toJson();
        }
    public function index()
        {
            return view('Layouts.LayoutsBackApp.Capitalisations.index');
        }

    public function create()
        {
            return view('Layouts.LayoutsBackApp.Capitalisations.Modals.create');
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
                $capitalisations = new capitalisations();
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
            return redirect()->route('labo.back.capitalisations.index')->with('success', 'Rapport crée avec succès!');
        }
    public function show($id)
        {
            $capitalisations = capitalisations::findOrfail($id);
            return view('Layouts.LayoutsBackApp.Capitalisations.Modals.show', compact('capitalisations'));
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
            return view('Layouts.LayoutsBackApp.Capitalisations.index');
        }
    public function delete($id)
        {
            $capitalisations = capitalisations::find($id);
            $capitalisations->delete();
            return response()->json(['type' => 'success', 'message' => 'Rapport numéro ' . $capitalisations->id . ' supprimé!']);
        }
    public function status($id)
        {
            $capitalisations = capitalisations::find($id);
            if ($capitalisations) {
                if ($capitalisations->status == "En ligne") {
                    $capitalisations->status = "Hors ligne";
                } else {
                    $capitalisations->status = "En ligne";
                }
            }
                $capitalisations->save();
            return response()->json(['type' => 'success', 'message' => 'Succes']);
        }
}

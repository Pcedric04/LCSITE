<?php

namespace App\Http\Controllers\BackControllers;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class agendaController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
        {
            $this->middleware('auth');
        }
    public function datatables()
        {
            $agendas = DB::table('agendas')->join('users','agendas.users_id','=','users.id')
            ->orderByDesc('id')
            ->select(
                'agendas.id',
                'agendas.titre',
                'agendas.contenu',
                'agendas.status',
                DB::raw("date_format(agendas.created_at,'%d-%M-%Y') as created_at"),
                'users.nickname as user_name'
            )
            ->get();
            return dataTables()->of($agendas)->addColumn('actions', function ($agendas) {
                return view('Layouts.LayoutsBackApp.Agendas.Actions.actions', ['agendas' => $agendas]);
            })->toJson();
        }
    public function index()
        {
            return view('Layouts.LayoutsBackApp.Agendas.index');
        }

    public function create()
        {
            return view('Layouts.LayoutsBackApp.Agendas.Modals.create');
        }

    public function store(Request $request)
        {
            $validatedData = $request->validate([
                'titre' => 'required',
                'contenu'
            ]);
            $user = Auth::user()->id;
                $agendas = new agendas();
                $agendas->titre = $request->titre;
                $agendas->contenu = $request->contenu;
                $agendas->users_id = $user;
                $agendas->save();
            return redirect()->route('labo.back.agendas.index')->with('success', 'Agenda crée avec succès!');
        }
    public function show($id)
        {
            $agendas = agendas::findOrfail($id);
            return view('Layouts.LayoutsBackApp.Agendas.Modals.show', compact('agendas'));
        }

    public function update($id, Request $request)
        {
            $validator = Validator::make($request->all(), [
                'titre' => 'required',
                'contenu'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 500);
            }
            $user = Auth::user()->id;
            $agendas = agendas::findOrFail($id);
            $agendas->titre = $request->titre;
            $agendas->contenu = $request->contenu;
            $agendas->users_id = $user;
            $agendas->save();
            return view('Layouts.LayoutsBackApp.Agendas.index');
        }
    public function delete($id)
        {
            $agendas = agendas::find($id);
            $agendas->delete();
            return response()->json(['type' => 'success', 'message' => 'Agenda numéro ' . $agendas->id . ' supprimé!']);
        }
    public function status($id)
        {
            $agendas = agendas::find($id);
            if ($agendas) {
                if ($agendas->status == "En ligne") {
                    $agendas->status = "Hors ligne";
                } else {
                    $agendas->status = "En ligne";
                }
            }
                $agendas->save();
            return response()->json(['type' => 'success', 'message' => 'Succes']);
        }
}

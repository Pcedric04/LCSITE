<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\gouvernance;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class gouvernancesController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
        {
            $this->middleware('auth');
        }
    public function datatables()
        {
            $gouvernances = DB::table('gouvernances')->join('users','users.id','=','gouvernances.users_id')
            ->select(
                'gouvernances.id',
                'gouvernances.titres',
                'gouvernances.numero',
                'gouvernances.auteurs',
                'gouvernances.documents',
                'gouvernances.status',
                DB::raw("date_format(gouvernances.created_at,'%d-%M-%Y') as created_at"),
                'users.nickname'
            )
            ->orderByDesc('gouvernances.created_at')
            ->get();
            return dataTables()->of($gouvernances)->addColumn('actions', function ($gouvernances) {
                return view('backoffice.body.Gouvernances.Actions.actions', ['gouvernances' => $gouvernances]);
            })->toJson();
        }
    public function index()
        {
            return view('backoffice.body.Gouvernances.index');
        }

    public function create()
        {
            return view('backoffice.body.Gouvernances.Modals.create');
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
                $gouvernances = new gouvernance();
                $gouvernances->titres = $request->titres;
                $gouvernances->numero = $request->numero;
                $gouvernances->auteurs = $request->auteurs;
                if($request->hasFile('documents')){
                    $documents = $request->file('documents');
                    $documents1 = $documents->getClientOriginalName();
                    request()->documents->move(public_path('front/admin/pdf/gouvernances'), $documents1);
                    $gouvernances->documents = $documents1;
                }
                $gouvernances->users_id = $user;
                $gouvernances->save();
            return redirect()->route('labo.back.gouvernances.index')->with('success', 'Publication crée avec succès!');
        }
    public function show($id)
        {
            $gouvernances = gouvernance::findOrfail($id);
            return view('backoffice.body.Gouvernances.Modals.show', compact('gouvernances'));
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
            $gouvernances = gouvernance::findOrFail($id);
            $gouvernances->titres = $request->titres;
            $gouvernances->numero = $request->numero;
            $gouvernances->auteurs = $request->auteurs;
            if($request->hasFile('documents')){
                $documents = $request->file('documents');
                $documents1 = $documents->getClientOriginalName();
                request()->documents->move(public_path('front/admin/pdf/gouvernances'), $documents1);
                $gouvernances->documents = $documents1;
            }
            $gouvernances->users_id = $user;
            $gouvernances->save();
            return view('backoffice.body.Gouvernances.index');
        }
    public function delete($id)
        {
            $gouvernances = gouvernance::find($id);
            $gouvernances->delete();
            return response()->json(['type' => 'success', 'message' => 'Publication numéro ' . $gouvernances->id . ' supprimé!']);
        }
    public function status($id)
        {
            $gouvernances = gouvernance::find($id);
            if ($gouvernances) {
                if ($gouvernances->status == "En ligne") {
                    $gouvernances->status = "Hors ligne";
                } else {
                    $gouvernances->status = "En ligne";
                }
            }
                $gouvernances->save();
            return response()->json(['type' => 'success', 'message' => 'Succès']);
        }
}

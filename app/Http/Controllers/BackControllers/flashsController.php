<?php

namespace App\Http\Controllers\BackControllers;

use App\Http\Controllers\Controller;
use App\Models\flashinfos;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
class flashsController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function datatables()
    {
        $flashinfos = DB::table('flashinfos')->join('users', 'flashinfos.users_id', '=', 'users.id')
            ->select(
                'flashinfos.id',
                'flashinfos.infosflash',
                'flashinfos.liens',
                'flashinfos.status',
                DB::raw("date_format(flashinfos.created_at,'%d-%M-%Y') as created_at"),
                'users.nickname as users_name',
                'users.surname as users_surname'
            )->get();
        return dataTables()->of($flashinfos)->addColumn('actions', function ($flashinfos) {
            return view('Layouts.LayoutsBackApp.Flash.Actions.actions', ['flashinfos' => $flashinfos]);
        })->toJson();
    }

    public function index()
    {
        return view('Layouts.LayoutsBackApp.Flash.index');
    }
    public function create()
    {
        return view('Layouts.LayoutsBackApp.Flash.Modals.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'flashinfos' => 'required',
            'liens'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }
        $user = Auth::user()->id;
        $flash = new flashinfos();
        $flash->infosflash = $request->flashinfos;
        $flash->liens = $request->liens;
        $flash->users_id = $user;
        $flash->save();
        return redirect()->route('labo.back.infos.index')->with('success', 'Flash infos crée avec succès!');
    }

    public function show($id)
    {
        $flash = flashinfos::findOrfail($id);
        return view('Layouts.LayoutsBackApp.Flash.Modals.show', compact('flash'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'flash' => 'required',
            'liens'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }
        $flash = flashinfos::findOrFail($id);
        $flash->infosflash = $request->flash;
        $flash->save();
        return view('Layouts.LayoutsBackApp.Flash.index');
    }
    public function delete($id)
    {
        $flash = flashinfos::find($id);
        $flash->delete();
        return response()->json(['type' => 'success', 'message' => 'Flash info numéro ' . $flash->id . ' supprimé!']);
    }
    public function status($id)
    {
        $flash = flashinfos::find($id);
        if ($flash) {
            if ($flash->status == "Hors ligne") {
                $flash->status = "En ligne";
            } else {
                $flash->status = "Hors ligne";
            }
            $flash->save();
            return response()->json(['type' => 'success', 'message' => 'Succes']);
        }
    }
}

<?php

namespace App\Http\Controllers\BackControllers;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\souscategories;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class souscategoriesController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function datatables()
    {
        $souscategories = souscategories::with('categories')->with('users')
      /*   ->select(
            'souscategories.name as Sname',
            'souscategories.status',
            'categories[].name as Cname',
            'users.surname'
        ) */
        ->get();
        return dataTables()->of($souscategories)->addColumn('actions', function ($souscategories) {
            return view('Layouts.LayoutsBackApp.SousCategories.Actions.actions', ['souscategories' => $souscategories]);
        })->toJson();
    }
    public function index()
    {
        return view('Layouts.LayoutsBackApp.SousCategories.index');
    }
    public function create()
    {
        $categories = categories::all();
        return view('Layouts.LayoutsBackApp.SousCategories.Modals.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'souscategories' => 'required',
            'categories' => 'required|array|min:1'
        ]);

        $user = Auth::user()->id;
            $souscategories = new souscategories();
            $souscategories->name = $request->souscategories;
            $souscategories->users_id = $user;
            $souscategories->save();
            $souscategories->categories()->sync($validatedData['categories']);
        return redirect()->route('labo.back.souscategories.index')->with('success', 'Sous catégories crée avec succès!');
    }
    public function show($id)
    {
        $souscategories = souscategories::findOrfail($id);
        $categories = categories::where('status','=','En ligne')->get();
        return view('Layouts.LayoutsBackApp.SousCategories.Modals.show',compact('souscategories','categories'));
    }
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'souscategories' => 'required',
            'categories' => 'required|array|min:1'
        ]);

        $user = Auth::user()->id;
            $souscategories = souscategories::findOrFail($id);
            $souscategories->name = $request->souscategories;
            $souscategories->users_id = $user;
            $souscategories->save();
            $souscategories->categories()->sync($validatedData['categories']);
        return redirect()->route('labo.back.souscategories.index')->with('success', 'Sous catégories à été mise à jour avec succès!');
    }
    public function delete($id)
    {
         $souscategories = souscategories::find($id);
        $souscategories->delete();
        return response()->json(['type' => 'success', 'message' => 'Sous categories numéro ' . $souscategories->id . ' supprimé!']);
    }
    public function status($id)
    {
        $souscategories = souscategories::find($id);
        if ($souscategories) {
            if ($souscategories->status == "En ligne") {
                $souscategories->status = "Hors ligne";
            } else {
                $souscategories->status = "En ligne";
            }
        }
            $souscategories->save();
            return response()->json(['type' => 'success', 'message' => 'Succes']);
    }
}

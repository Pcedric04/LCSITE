<?php

namespace App\Http\Controllers\BackControllers;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class categoriesController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatables()
    {
        $categories = DB::table('categories')->join('users', 'categories.users_id', '=', 'users.id')
            ->select(
                'categories.id',
                'categories.name',
                'categories.status',
                DB::raw("date_format(categories.created_at,'%d-%M-%Y') as created_at"),
                'users.nickname as users_name',
                'users.surname as users_surname'
            )->get();
        return dataTables()->of($categories)->addColumn('actions', function ($categories) {
            return view('Layouts.LayoutsBackApp.Categories.Actions.actions', ['categories' => $categories]);
        })->toJson();
    }
    public function index()
    {

        return view('Layouts.LayoutsBackApp.Categories.index');
    }

    public function create()
    {
        return view('Layouts.LayoutsBackApp.Categories.Modals.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categories' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }
        $user = Auth::user()->id;
        $categories = new categories();
        $categories->name = $request->categories;
        $categories->users_id = $user;
        $categories->save();
        return redirect()->route('labo.back.categories.index')->with('success', 'Catégories crée avec succès!');
    }
    public function show($id)
    {
        $categories = categories::findOrfail($id);
        return view('Layouts.LayoutsBackApp.Categories.Modals.show',compact('categories'));
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'categories' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }
        $user = Auth::user()->id;
        $categories = categories::findOrFail($id);
        $categories->name = $request->categories;
        $categories->users_id = $user;
        $categories->save();
        return view('Layouts.LayoutsBackApp.Categories.index');
    }
    public function delete($id)
    {
        $categories = categories::find($id);
        $categories->delete();
        return response()->json(['type' => 'success', 'message' => 'Categories numéro ' . $categories->id . ' supprimé!']);
    }
    public function status($id)
    {
        $categories = categories::find($id);
        if ($categories) {
            if ($categories->status == "En ligne") {
                $categories->status = "Hors ligne";
            } else {
                $categories->status = "En ligne";
            }
        }
            $categories->save();
            return response()->json(['type' => 'success', 'message' => 'Succes']);

    }
}

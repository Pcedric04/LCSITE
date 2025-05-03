<?php

namespace App\Http\Controllers\BackControllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class permissionsController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatables()
    {
        $permissions = Permission::get();
        return dataTables()->of($permissions)->addColumn('actions', function ($permissions) {
            return view('Layouts.LayoutsBackApp.Permissions.Actions.action', ['permissions' => $permissions]);
        })->toJson();
    }

    public function index()
        {
            return view('Layouts.LayoutsBackApp.Permissions.index');
        }
    public function create()
        {

            return view('Layouts.LayoutsBackApp.Permissions.Modals.create');
        }
    public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name'=>'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 500);
            }

            $permissions = new Permission();
            $permissions->name = $request->name;
            $permissions -> save();

        return response()->json(['type' => 'success', 'message' => ' ']);
    }
}

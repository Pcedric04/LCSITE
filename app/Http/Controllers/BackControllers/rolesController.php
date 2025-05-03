<?php

namespace App\Http\Controllers\BackControllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class rolesController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatables()
    {
        $roles = Role::with('permissions')->get();
        return dataTables()->of($roles)->addColumn('actions', function ($roles) {
            return view('Layouts.LayoutsBackApp.Roles.Actions.action', ['roles' => $roles]);
        })->toJson();
    }

    public function index()
        {
            return view('Layouts.LayoutsBackApp.Roles.index');
        }
    public function create()
        {
            $permissions = Permission::all();
            return view('Layouts.LayoutsBackApp.Roles.Modals.create',compact('permissions'));
        }
    public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name'=>'required'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 500);
            }

            $role = new Role();
            $role->name = $request->name;
            $role -> save();
            $permissions = $request->permissions;

            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }
        return response()->json(['type' => 'success', 'message' => ' ']);
    }
}

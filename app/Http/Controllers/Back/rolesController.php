<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            return view('backoffice.body.Roles.Actions.action', ['roles' => $roles]);
        })->toJson();
    }

    public function index()
        {
            $photo = DB::table('photosprofils')->where('users_id',Auth::user()->id)->first();
         if ($photo != null) {
            $photo = $photo->titre;
         } else {
            $photo = 'avatar.png';
         }
            return view('backoffice.body.Roles.index',compact('photo'));
        }
    public function create()
        {
            $permissions = Permission::all();
            return view('backoffice.body.Roles.Modals.create',compact('permissions'));
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

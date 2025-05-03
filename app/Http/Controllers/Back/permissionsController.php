<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $permissions = DB::table('permissions')
        ->select(
            'permissions.name',
            'permissions.id',
            DB::raw("date_format(permissions.created_at,'%d-%M-%Y') as created_at")
            )->get();
        return dataTables()->of($permissions)->addColumn('actions', function ($permissions) {
            return view('backoffice.body.Permissions.Actions.action', ['permissions' => $permissions]);
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
            return view('backoffice.body.Permissions.index',compact('photo'));
        }
    public function create()
        {

            return view('backoffice.body.Permissions.Modals.create');
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

<?php

namespace App\Http\Controllers\BackControllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usersController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatables()
    {
        $users = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select(
                'users.id',
                'users.name',
                'users.surname',
                'users.nickname',
                DB::raw("date_format(users.created_at,'%Y-%m-%d') as created_at"),
                /* 'users.status', */
                'roles.name as Role_name'
            )->orderBy('users.id')->get();
        return dataTables()->of($users)->addColumn('actions', function ($users) {
            return view('Layouts.LayoutsBackApp.Users.Actions.actions', ['users' => $users]);
        })->toJson();
    }
    public function index()
        {
            return view('Layouts.LayoutsBackApp.Users.index');
        }
    public function create()
        {
        $roles = Role::get();
        return view('Layouts.LayoutsBackApp.Users.Modals.create', compact('roles'));
        }
    public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required',
                'surname' => 'required|min:1',
                'nickname'=> 'required',
                'email'=> 'required',
                'roles'=> 'required'
            ]);

            $user = Auth::user()->id;
                $users = new User();
                $users->name = $request->name;
                $users->surname = $request->surname;
                $users->nickname = $request->nickname;
                $users->email = $request->email;
                $users->password = Hash::make('password');
                $users->save();
                $users->roles()->attach($request->roles);
            return redirect()->route('labo.back.users.index')->with('success', 'Utilisateur crée avec succès!');
        }

    public function show($id)
        {
        $users = User::findOrFail($id);
        $roles = Role::get();
        return view('Layouts.LayoutsBackApp.Users.Modals.show',['users'=>$users,'roles'=>$roles]);
        }
    public function update(Request $request,$id)
        {
            $validatedData = $request->validate([
                'name' => 'required',
                'surname' => 'required|min:1',
                'nickname'=> 'required',
                'email'=> 'required',
                'roles'=> 'required'
            ]);

            $user = Auth::user()->id;
                $users = User::findOrFail($id);
                $users->name = $request->name;
                $users->surname = $request->surname;
                $users->nickname = $request->nickname;
                $users->email = $request->email;
                $users->save();
                $users->syncRoles($request->roles);
            return redirect()->route('labo.back.users.index')->with('success', 'Utilisateur crée avec succès!');
        }
    public function delete($id)
        {
            $user = User::find($id);
            $user->delete();
            return response()->json(['type' => 'success', 'message' => 'Utlisateur Supprimé!']);
        }
}

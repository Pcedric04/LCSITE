<?php

namespace App\Http\Controllers\BackControllers;

use App\Http\Controllers\Controller;
use App\Models\albums;
use App\Models\categories;
use App\Models\photos;
use App\Service\categoriesService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class albumsController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatables()
    {
        $albums = DB::table('albums')
        ->join('categories','categories.id','=','albums.categories_id')
        ->join('souscategories','souscategories.id','=','albums.souscategories_id')
        ->join('users','users.id','=','albums.users_id')
        ->orderByDesc('id')
        ->select(
            'albums.id',
            'albums.logo',
            'albums.titre',
            'albums.status',
            DB::raw("date_format(albums.created_at,'%d-%M-%Y') as created_at"),
            'users.nickname'
        )
        ->get();
        return dataTables()->of($albums)->addColumn('actions', function ($albums) {
            return view('Layouts.LayoutsBackApp.Albums.Actions.actions', ['albums' => $albums]);
        })->toJson();
    }
    public function indexAlbums()
    {
        return view('Layouts.LayoutsBackApp.Albums.index');
    }

    public function createAlbums()
    {
        $categories = categories::where('status', '=', 'En ligne')->get();
        return view('Layouts.LayoutsBackApp.Albums.Modals.create', compact('categories'));
    }

    public function random_souscategories($id)
    {
        $souscategories = categoriesService::souscategories($id);
        return view('Layouts.LayoutsBackApp.Videos.Partials.souscategories', ['souscategories'=>$souscategories]);

    }

    public function storeAlbums(Request $request)
    {
        $maxFileSize = 10000000;
        $validator = Validator::make($request->all(), [
            'logo' => 'required|mimes:png,JPG,jpeg|max:20240',
            'titre' => 'required',
            'description',
            'categories' => 'required',
            'souscategories',
            'albums.*' => 'required|mimes:png,JPG,jpeg|max:20240',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }
        $x = 10;
        $albums = new albums();
        if ($request->hasFile('logo')) {
            $present = $request->file('logo');
            $present1 = $present->getClientOriginalName();
            request()->logo->move(public_path('AlbumsLogo'), $present1);
            $albums->logo = $present1;
        }
        $albums->titre = $request->titre;
        $albums->categories_id = $request->categories;
        $albums->souscategories_id = $request->souscategories;
        $albums->users_id = Auth::id();
        $albums->save();

        $lastalbums = albums::latest()->first();
        $file= $request->file('albums');
        if ($request->hasFile('albums')) {
            foreach($request->file('albums') as $key => $file)
                {
                $name = $file->getClientOriginalName();
                $paths= $file->move(public_path('Albums'), $name);
                $file = new photos();
                $file->photo_name = $name;
                //$file = \Image::make($request->file('albums'),$x);
                $file->albums_id = $lastalbums->id;
                $file->users_id = Auth::id();
                $file->save();
            }
        }
        return redirect()->back()->with('success',"Files Uploaded Successfully!");
    }

    public function deleteAlbums($id)
    {
        $albums = albums::find($id);
/*             foreach ($albums as $items) {
                $photos = photos::find($items->id);
                $photos->delete();
            } */
        $albums->delete();
        return response()->json(['type' => 'success', 'message' => 'Albums numéro ' . $albums->id . ' supprimé!']);
    }
    public function statusAlbums($id)
    {

        $albums = albums::find($id);
        if ($albums) {
            if ($albums->status == "En ligne") {
                $albums->status = "Hors ligne";
            } else {
                $albums->status = "En ligne";
            }
        }
            $albums->save();
            return response()->json(['type' => 'success', 'message' => 'Succes']);
        }
}

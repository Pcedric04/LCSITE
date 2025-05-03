<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\slides;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
class slidesController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function datatables()
    {
        $slides = DB::table('slides')->join('users', 'slides.users_id', '=', 'users.id')
            ->select(
                'slides.id',
                'slides.image',
                'slides.titre',
                'slides.soustitre',
                'slides.status',
                DB::raw("date_format(slides.created_at,'%d-%M-%Y') as created_at"),
                'users.nickname as users_name',
                'users.surname as users_surname'
            )->get();
        return dataTables()->of($slides)->addColumn('actions', function ($slides) {
            return view('backoffice.body.Slides.Actions.action', ['slides' => $slides]);
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
        return view('backoffice.body.Slides.index',compact('photo'));
    }
    public function create()
    {
        return view('backoffice.body.Slides.Modals.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'titre' => 'required',
            'soustitre' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }
        $user = Auth::user()->id;
        $slides = new slides();
        if ($request->hasFile('image')) {
            $present = $request->file('image');
            $present1 = $present->getClientOriginalName();
            request()->image->move(public_path('front/admin/slides'), $present1);
            $slides->image = $present1;
        }
        $slides->titre = $request->titre;
        $slides->soustitre = $request->soustitre;
        $slides->users_id = $user;
        $slides->save();
        return redirect()->route('labo.back.slide.index')->with('success', 'Slide crée avec succès!');
    }

    public function show($id)
    {
        $slide = slides::findOrfail($id);
        return view('backoffice.body.Slides.Modals.show', compact('slide'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'titre' => 'required',
            'soustitre' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }
        $slide = slides::findOrFail($id);
        $slide->image = $request->image;
        $slide->titre = $request->titre;
        $slide->soustitre = $request->soustitre;
        $slide->save();
        return view('backoffice.body.Slides.index');
    }
    public function delete($id)
    {
        $slide = slides::find($id);
        $slide->delete();
        return response()->json(['type' => 'success', 'message' => 'slides numéro ' . $slide->id . ' supprimé!']);
    }
    public function status($id)
    {
        $slide = slides::find($id);
        if ($slide) {
            if ($slide->status == "Hors ligne") {
                $slide->status = "En ligne";
            } else {
                $slide->status = "Hors ligne";
            }
            $slide->save();
            return response()->json(['type' => 'success', 'message' => 'Succes']);
        }
    }
}

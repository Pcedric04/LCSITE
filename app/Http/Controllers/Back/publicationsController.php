<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\publications;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class publicationsController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
        {
            $this->middleware('auth');
        }
    public function datatables()
        {
            $publications = DB::table('publications')->join('users','users.id','=','publications.users_id')
            ->select(
                'publications.id',
                'publications.couverture',
                'publications.name',
                'publications.pays',
                'publications.documents',
                'publications.status',
                DB::raw("date_format(publications.created_at,'%d-%M-%Y') as created_at"),
                'users.nickname'
            )
            ->orderByDesc('publications.id')
            ->get();
            return dataTables()->of($publications)->addColumn('actions', function ($publications) {
                return view('backoffice.body.Publications.Actions.actions', ['publications' => $publications]);
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
            return view('backoffice.body.Publications.index',compact('photo'));
        }

    public function create()
        {
            return view('backoffice.body.Publications.Modals.create');
        }

 public function store(Request $request)
        {
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'pays' => 'required',
                'pages',
                'documents'=> 'required|max:80240'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 500);
            }
            $user = Auth::user()->id;
                $publications = new publications();
                $publications->name = $request->name;
                $publications->pays = $request->pays;

                if($request->hasFile('pages')){
                    $documentspage = $request->file('pages');
                    $documentspage1 = $documentspage->getClientOriginalName();
                    request()->pages->move(public_path('front/public/couverture'), $documentspage1);
                    $publications->couverture = $documentspage1;
                }

                if($request->hasFile('documents')){
                    $documents = $request->file('documents');
                    $documents1 = $documents->getClientOriginalName();
                    request()->documents->move(public_path('front/admin/pdf/publications'), $documents1);
                    $publications->documents = $documents1;
                }
                $publications->users_id = $user;
                $publications->save();
            return redirect()->route('labo.back.publications.index')->with('success', 'Publications crée avec succès!');
        }

        public function show($id)
        {
            $publications = publications::findOrfail($id);
            return view('backoffice.body.Publications.Modals.show', compact('publications'));
        }

    public function update($id, Request $request)
        {
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'pays' => 'required',
                'pages',
                'documents'=> 'required|max:80240'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 500);
            }
            $user = Auth::user()->id;
            $publications = publications::findOrFail($id);
            $publications->name = $request->name;
            $publications->pays = $request->pays;
            if($request->hasFile('pages')){
                $documentspage = $request->file('pages');
                $documentspage1 = $documentspage->getClientOriginalName();
                request()->pages->move(public_path('front/public/couverture'), $documentspage1);
                $publications->couverture = $documentspage1;
            }
            if($request->hasFile('documents')){
                $documents = $request->file('documents');
                $documents1 = $documents->getClientOriginalName();
                request()->documents->move(public_path('front/admin/pdf/publications'), $documents1);
                $publications->documents = $documents1;
            }

            $publications->users_id = $user;
            $publications->save();
            return redirect()->route('labo.back.publications.index')->with('success', 'Publication mis à jour avec succès!');
        }

    public function delete($id)
        {
            $publications = publications::find($id);
            $publications->delete();
            return response()->json(['type' => 'success', 'message' => 'Publication numéro ' . $publications->id . ' supprimé!']);
        }
    public function status($id)
        {
            $publications = publications::find($id);
            if ($publications) {
                if ($publications->status == "En ligne") {
                    $publications->status = "Hors ligne";
                } else {
                    $publications->status = "En ligne";
                }
            }
                $publications->save();
            return response()->json(['type' => 'success', 'message' => 'Succes']);
        }
}

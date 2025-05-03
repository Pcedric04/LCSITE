<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\contacts;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class contactControllers extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatables()
    {
        $contact = DB::table('contacts')->orderByDesc('contacts.id')
        ->select(
            'contacts.id',
            'contacts.nom_complet',
            'contacts.email',
            'contacts.objet',
            'contacts.message',
            'contacts.status',
            DB::raw("date_format(contacts.created_at,'%d-%M-%Y') as created_at")
        )
        ->get();
        return dataTables()->of($contact)->addColumn('actions', function ($contact) {
            return view('backoffice.body.Contact.Actions.actions', compact('contact'));
        })->toJson();
    }
    public function index()
    {
        return view('backoffice.body.Contact.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'objet' => 'required',
            'message' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error','Verifier vos renseignements');
        }
        $contact = new contacts();
            $contact->nom_complet = $request->name;
                $contact->email = $request->email;
                $contact->objet = $request->objet;
            $contact->message = $request->message;
        $contact->save();
        return redirect()->route('labo.front.contact.index')->with('success', 'Message envoyé avec succès!');
    }

    public function show($id)
    {
        $contact = contacts::findOrfail($id);
        return view('backoffice.body.contact.Modals.show',compact('contact'));
    }

    public function delete($id)
    {
        $contact = contacts::findOrFail($id);
        $contact->delete();
        return view('backoffice.body.contact.index');
    }
}

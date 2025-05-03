<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\newletters;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
class newlettersControllers extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('web');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:newletters,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error','Cet adresse email existe déjà');
        }
        $newletters = new newletters();
            $newletters->email = $request->email;
        $newletters->save();

        return redirect()->back()->with('success', 'Vous avez souscrit à la newsletter');

    }

    public function sendNewsletter()
    {
        $newsletter = new newletters();
        Mail::to('example@example.com')->send($newsletter);
    }
}

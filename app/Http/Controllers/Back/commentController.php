<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class commentController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatables()
    {
        $comment_post = DB::table('comments')->join('posts','posts.id','=','comments.post_id')
        ->orderByDesc('comments.id')
        ->select(
            'posts.titre',
            'comments.id',
            'comments.name',
            'comments.email',
            'comments.content',
            'comments.status',
            DB::raw("date_format(comments.created_at,'%d-%M-%Y') as created_at")
        )
        ->get();
        return dataTables()->of($comment_post)->addColumn('actions', function ($comment_post) {
            return view('backoffice.body.Comments.Actions.actions', ['comment_post' => $comment_post]);
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
        return view('backoffice.body.Comments.index',compact('photo'));
    }
    public function show($id)
        {
            $comments = Comment::findOrfail($id);
            return view('backoffice.body.comments.Modals.show',['comments'=>$comments]);
        }
    public function update(Request $request,$id)
        {
            $validator = Validator::make($request->all(), [
                'auteur' => 'required',
                'contenu'=> 'required'

            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 500);
            }

            $user = Auth::user()->id;
            $comments = Comment::findOrFail($id);
            $comments->name = $request->auteur;
            $comments->content = $request->contenu;
            $comments->save();
            return view('backoffice.body.comments.index');
        }
    public function delete($id)
    {
        $comments = Comment::findOrFail($id);
        $comments->delete();
        return view('backoffice.body.comments.index');
    }
    public function status($id)
    {
        $comments = Comment::find($id);
        if ($comments) {
            if ($comments->status == "En ligne") {
                $comments->status = "Hors ligne";
            } else {
                $comments->status = "En ligne";
            }
            $comments->save();
            return response()->json(['type' => 'success', 'message' => 'Succes']);
        }
        return view('backoffice.body.comments.index');
    }
}

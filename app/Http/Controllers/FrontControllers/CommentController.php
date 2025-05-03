<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
        {
            $this->middleware('web');
        }
    public function store(Request $request, $postId)
        {
            $validatedData = $request->validate([
                'nom'=> 'required|min:3',
                'content' => 'required|max:255',
            ]);

            $comment = new Comment();
            $comment->name = $validatedData['nom'];
            $comment->content = $validatedData['content'];
            $comment->post_id = $postId;
            $comment->save();

            return redirect()->back()->with('success','Votre commentaire a été envoyé');
        }
}

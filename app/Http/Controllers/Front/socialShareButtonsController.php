<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\categories;
use App\Models\flashinfos;
use App\Models\posts;
use App\Models\souscategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class socialShareButtonsController extends Controller
{
    public function ShareWidget(posts $post, $id)
    {
        $shareComponent = \Share::page(
            'https://www.civitac.org/',
            'Your share text comes here',
        )->facebook()->twitter()->linkedin()->telegram()->whatsapp();
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status', '=', 'En ligne')->orderByDesc('id')->get();
        $posts = DB::table('categories')
        ->join('posts', 'posts.categories_id', '=', 'categories.id')
            ->join('users', 'users.id', 'posts.users_id')
            ->where('posts.id', $id)
            ->select(
                'posts.id',
                'posts.photoIllustration',
                'posts.titre',
                'posts.sousTitre',
                'posts.contenus',
                DB::raw("date_format(posts.created_at,'%d-%M-%Y') as created_at"),
                'users.name',
                'users.surname as surname',
                'categories.id as categories_id',
                'categories.name as Sname'
            )
            ->first();
        if (!Session::has('post_visited_'.$id)) {
            // Increment the visit count
           /*  $post->visit_count++;
            $post->save(); */
            $post->incrementVisits($id);
            // Store a session value to mark the post as visited in the current session
            Session::put('post_visited_'.$id, true);
        }
        /* $visitCount = $post->visits; */

        $sousCat = DB::table('categories')
        ->join('categories_souscategories','categories_souscategories.categories_id','=','categories.id')
        ->join('souscategories','souscategories.id','=','categories_souscategories.souscategories_id')
        ->where('categories.id','=',$posts->categories_id)
        ->get();
        $Comment = DB::table('comments')
                        ->join('posts','posts.id','=','comments.post_id')
                        ->where([['comments.status','=','En ligne'],['comments.post_id','=',$id]])
                        ->select(
                            'comments.id',
                            'posts.id as Pid',
                            'posts.titre',
                            DB::raw("date_format(comments.created_at,'%d/%m/%y') as created_at"),
                            'comments.post_id',
                            'comments.name',
                            'comments.content'
                        )
                        ->orderByDesc('comments.id')
                        ->get();
        $Comment_Post = DB::table('comments')
                        ->join('posts','posts.id','=','comments.post_id')
                        ->where([['comments.status','=','En ligne'],['comments.post_id','=',$id]])
                        ->select(
                            'comments.id',
                            'posts.id as Pid',
                            'posts.titre',
                            DB::raw("date_format(comments.created_at,'%d/%m/%y') as created_at"),
                            'comments.post_id',
                            'comments.name',
                            'comments.content'
                        )
                        ->orderByDesc('comments.id')
                        ->paginate(3);
            $post_all = DB::table('posts')->where('posts.id','!=',$id)
            ->select(
                'posts.id',
                'posts.titre',
                'posts.photoIllustration',
                DB::raw("date_format(posts.created_at,'%d-%M-%Y') as created_at"),
            )->orderByDesc('id')->paginate(3);
            $categories = categories::orderByDesc('id')->get();
            $souscategories = souscategories::orderByDesc('id')->get();
        return view('frontoffice.body.news.single_news',
                compact('shareComponent','posts','post_all','message','sousCat','Comment_Post','agendas','categories','souscategories','Comment'));

    }
}

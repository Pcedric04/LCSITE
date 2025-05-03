<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\agendas;
use App\Models\categories;
use App\Models\Comment;
use App\Models\flashinfos;
use App\Models\posts;
use App\Models\souscategories;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Jorenvh\Share\ShareFacade as Share;
use Session;

class postsController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status', '=', 'En ligne')->orderByDesc('id')->get();
        $posts = DB::table('categories')
            ->join('posts', 'posts.categories_id', '=', 'categories.id')
            ->join('souscategories','souscategories.id','=','posts.souscategories_id')
            ->orderByDesc('posts.id')
            ->where('posts.status', '=', 'En ligne')
            ->select(
                'categories.id',
                'posts.id as postsId',
                'categories.name',
                'souscategories.name as Sname',
                'categories.status',
                'posts.id as posts_id',
                'posts.photoIllustration',
                'posts.titre',
                'posts.sousTitre',
                'posts.visits',
                'posts.contenus',
                DB::raw("date_format(posts.created_at,'%d-%M-%Y') as created_at")
            )
            ->paginate(5);
        /*     $postsComments = DB::table('categories')
            ->join('posts', 'posts.categories_id', '=', 'categories.id')
            ->join('souscategories','souscategories.id','=','posts.souscategories_id')
            ->orderByDesc('posts.id')
            ->where('posts.status', '=', 'En ligne')
            ->select(
                'categories.id',
                'posts.id as postsId',
                'categories.name',
                'souscategories.name as Sname',
                'categories.status',
                'posts.id as posts_id',
                'posts.photoIllustration',
                'posts.titre',
                'posts.sousTitre',
                'posts.visits',
                'posts.contenus',
                DB::raw("date_format(posts.created_at,'%d-%M-%Y') as created_at")
            )
            ->get();
            $data=[];
            foreach ($postsComments as $items) {
                $Temp=[];
                $Comment = DB::table('comments')
                ->join('posts','posts.id','=','comments.post_id')
                ->where([['comments.status','=','En ligne'],['comments.post_id','=',$items->postId]])
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
                    $Temp['comments']=$Comment;
            }
            //        dd($Temp); */

            $postsall = posts::orderByDesc('posts.id')->paginate(3);
            $categories = categories::orderByDesc('id')->get();
            $souscategories = souscategories::orderByDesc('id')->get();
        return view('frontoffice.body.news.all_news', ['message' => $message, 'posts' => $posts,
        'postsall'=>$postsall,'agendas'=>$agendas,'categories'=>$categories,'souscategories'=>$souscategories]);
    }
    public function souscatActu($id)
    {
        $agendas = agendas::where('status','=','En ligne')->orderByDesc('id')->paginate(3);
        $message = flashinfos::where('status', '=', 'En ligne')->orderByDesc('id')->get();
        $posts = DB::table('categories')
            ->join('posts', 'posts.categories_id', '=', 'categories.id')
            ->join('souscategories','souscategories.id','=','posts.souscategories_id')
            ->orderByDesc('posts.id')
            ->where('posts.souscategories_id', '=',$id)
            ->select(
                'categories.id',
                'posts.id as postsId',
                'categories.name',
                'souscategories.name as Sname',
                'categories.status',
                'posts.id as posts_id',
                'posts.photoIllustration',
                'posts.titre',
                'posts.sousTitre',
                'posts.visits',
                'posts.contenus',
                DB::raw("date_format(posts.created_at,'%d-%m-%y') as created_at")
            )
            ->paginate(5);
            $postsall = DB::table('posts')->orderByDesc('id')->paginate(3);
            $categories = categories::orderByDesc('id')->get();
            $souscategories = souscategories::orderByDesc('id')->get();
        return view('frontoffice.body.news.under_news', compact('message','posts','postsall','categories','souscategories','agendas'));
    }
    public function details(posts $post,$id)
    {
        $url = 'http://labo.ong/actualités/toutes les actualités/'.$id.'/plus';
        $shareComponent = Share::page($url)->facebook()->twitter()->linkedin()->telegram()->whatsapp();
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
        $imageUrl = $posts->photoIllustration;
        $imageTitre = $posts->titre;
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
                            DB::raw("date_format(comments.created_at,'le %d %M %Y à %h:%i:%s') as created_at"),
                            'comments.post_id',
                            'comments.name',
                            'comments.content'
                        )
                        ->orderByDesc('comments.id')
                        ->paginate(3);
        $postsall = DB::table('posts')->orderByDesc('id')
                        ->select(
                            'posts.id',
                            'posts.photoIllustration',
                            'posts.titre',
                            DB::raw("date_format(posts.created_at,'%d-%m-%y') as created_at"),
                        )
                        ->paginate(3);
        $categories = categories::orderByDesc('id')->get();
        $souscategories = souscategories::orderByDesc('id')->get();
        return view('frontoffice.body.news.single_news',compact('imageTitre','imageUrl','shareComponent','posts','postsall','message','sousCat','Comment_Post','agendas','categories','souscategories','Comment'));
    }

/*     public function likePost($id)
    {
        $posts = posts::find($id);
        $posts->like(0);
        $posts->save();
        return redirect()->route('labo.index')->with('message','J\'aime!');
    }

    public function unlikePost($id)
    {
        $posts = posts::find($id);
        $posts->unlike(0);
        $posts->save();
        return redirect()->route('labo.index')->with('message','Je n\'aime pas!');
    } */
}

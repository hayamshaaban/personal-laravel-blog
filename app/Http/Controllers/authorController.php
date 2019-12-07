<?php

namespace App\Http\Controllers;
use App\Http\Requests\createPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Charts\DashboardChart;
use App\Post;
use App\Comment;
use App\User;
class authorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('checkRole:author');
        return $this->middleware('auth');
    }
    public function comments()
    {
        $posts=Post::where('user_id',Auth::id())->pluck('id')->toArray();
        $comments=Comment::whereIn('post_id',$posts)->get();
        return view('author.comments',compact('comments'));

    }
    public function dashboard()
    {
        $posts=Post::where('user_id',Auth::id())->pluck('id')->toArray(); 
        $allComments=Comment::whereIn('post_id',$posts)->get(); 
        $commentsToday=$allComments->where('created_at','>=',today())->count(); 

        $chart=new DashboardChart;
        $days=$this->generateDateRange(now()->subDays(30),now());
        $posts=[];
        foreach($days as $day)
        {
            $posts[]=Post::whereDate('created_at',$day)->where('user_id',Auth::id())->count();
        }

        $chart->dataset('posts','line',$posts);
        $chart->labels($days);

        return view('author.dashboard',compact('allComments','commentsToday','chart')) ;    
    }
    private function generateDateRange($start_date,$end_date)
    {
        $dates=[];
        for($date=$start_date;$date->lte($end_date);$date->addDay())
        {
            $dates[]=$date->format('Y-m-d') ;  
        }
        return $dates;

    }
    public function posts()
    {
        return view('author.posts');
        
    }
    public function newPost()
    {
        return view('author.newPost');

    }
    public function createPost(createPost $request)
    {
        $post=new Post();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->user_id=Auth::id();
        $post->save();
        return back()->with('success','Post created succefully');

    }
    public function editPost($id)
    {
        $post=Post::where('id',$id)->where('user_id',Auth::id())->first();
        return view('author.editPost',compact('post'));
    }
    public function updatePost(createPost $request ,$id)
    {
        $post=Post::where('id',$id)->where('user_id',Auth::id())->first();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->save();

        return back()->with('success','Post updated succefully');
    }
    public function deletePost($id)
    {
        $post=Post::where('id',$id)->where('user_id',Auth::id())->first();
        $post->delete();
        return back();

    }
}

 
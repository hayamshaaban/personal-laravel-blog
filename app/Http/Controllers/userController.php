<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Charts\DashboardChart;


class userController extends Controller
{
    //
    public function __construct()
    {
   
     $this->middleware('auth');
    }
    public function dashboard()
    {
        $chart=new DashboardChart;
        $days=$this->generateDateRange(now()->subDays(30),now());
        $comments=[];
        foreach($days as $day)
        {
            $comments[]=Comment::whereDate('created_at',$day)->where('user_id',Auth::id())->count();
        }

        $chart->dataset('comments','line',$comments);
        $chart->labels($days);

        return view('user.dashboard',compact('chart'));
        
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
   
    public function comments()

    {
        $posts=Post::where('user_id',Auth::id())->pluck('id')->toArray();
        $comments=Comment::whereIn('post_id',$posts)->get();
        return view('user.comments',compact('comments'));
    
     

    }
    public function deletecomment($id)
    {
        $comment=Comment::where('id',$id)->where('user_id',Auth::id())->delete();
      
        return back();

    }
   
    public function profile()
    {
        return view('user.profile');
        
    }
    public function profilePost(UserUpdate $request)
    {
        $user=Auth::User();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->save();
        if($request['password']!="")
        {
            if(!(Hash::check($request['password'],Auth::user()->password)))
            {
            return  redirect()->back()->with('error','Your current password dose not match with the password conditions') ;
            }
            if(strcmp($request['password'],$request['new_password']) == 0)
            {
         return  redirect()->back()->with('error','Your  password cannont be the same of the current password') ;
            }
            $validation=$request->validate([
                'password'=>'required',
                'new_password'=>'required|string|min:6|confirmed',
            ]);
            $user->password=bcrypt($request['new_password']);
            $user->save();
            return redirect()->back()->with('success','password changed succefully');
        }
    
        return back();
  
    }
    public function newComment(Request $request)
    {
    $comment=new Comment;
    $comment->post_id=$request->post;
    $comment->user_id=Auth::id();
    $comment->content=$request->comment;
    $comment->save();
    return back();
    }
  
}

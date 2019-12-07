<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Comment;
use App\Product;



use Illuminate\Http\Request;
use App\Charts\DashboardChart;
use App\Http\Requests\createPost;
use App\Http\Requests\UserUpdate;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:admin');
     $this->middleware('auth');
    }
    //
    public function dashboard()
    {
        $chart=new DashboardChart;
        $days=$this->generateDateRange(now()->subDays(30),now());
        $posts=[];
        foreach($days as $day)
        {
            $posts[]=Post::whereDate('created_at',$day)->count();
        }

        $chart->dataset('posts','line',$posts);
        $chart->labels($days);

        return view('admin.dashboard',compact('chart'));
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
    public function users()
    {
        $users=User::all();
        return view('admin.users',compact('users'));
    }
    public function editUser($id)
    {
        $user=User::where('id',$id)->first();
        return view('admin.editUser',compact('user'));
    }
    public function updateUser(UserUpdate $request ,$id)
    {
        $user=User::where('id',$id)->first();
        $user->name=$request->name;
        $user->email=$request->email;

        if($request['author']==1)
        {
            $user->author =true;
        }elseif($request['admin']==1)
        {
            $user->admin =true;
        }
        $user->save();
        return back()->with('success','User updated succefully');
    }
  
    public function posts()
    {
        $posts=Post::all();
        return view('admin.posts',compact('posts'));
    }
    public function comments()
    {
        $posts=Post::all();
        $comments=Comment::all();
        return view('admin.comments',compact('comments','posts'));
    }
    public function editPost($id)
    {
        $post=Post::where('id',$id)->first();
        return view('admin.editPost',compact('post'));
    }
    public function updatePost(createPost $request ,$id)
    {
        $post=Post::where('id',$id)->first();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->save();

        return back()->with('success','Post updated succefully');
    }
    public function deletePost($id)
    {
        $post=Post::where('id',$id)->first();
        $post->delete();
        return back();

    }
    public function deleteComment($id)
    {
        $comment=Comment::where('id',$id)->first();
        $comment->delete();
        return back();

    }
    public function deleteUser($id)
    {
        $user=User::where('id',$id)->first();
        $user->delete();
        return back();
    }
    public function products(){
        $products=Product::all();
        return view ('admin.products',compact('products'));
    }
    public function newProducts(){
        return view ('admin.newProduct');
    }
    public function storeProducts(Request $request){
    $this->validate($request,[
        'thumbnail'=>'required|file',
        'title'=>'required|string',
        'desc'=>'required',
        'price'=>'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
    ]);
    $products=new Product;
    $products->title=$request->title;
    $products->desc=$request->desc;
    $products->price=$request->price;
    $products->title=$request->title;
    //image
    $thumbnail=$request->file('thumbnail');
    $fileName=$thumbnail->getClientOriginalName();
    $fileExtension=$thumbnail->getClientOriginalExtension();
    $thumbnail->move('products-images', $fileName);
    $products->thumbnail='products-images/'.$fileName;

    $products->save();
    return back();
    }
    public function editProduct($id){
        $product =Product::findOrFail($id);
        return view ('admin.editProduct',compact('product'));
    }
    public function updateProduct(Request $request,$id){
        $this->validate($request,[
            'thumbnail'=>'file',
            'title'=>'required|string',
            'desc'=>'required',
            'price'=>'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
        ]);
    $product =Product::findOrFail($id);
    $product->title=$request->title;
    $product->desc=$request->desc;
    $product->price=$request->price;
    $product->title=$request->title;
            //image
            if($request->hasFile('thumbnail')){
            $thumbnail=$request->file('thumbnail');
            $fileName=$thumbnail->getClientOriginalName();
            $fileExtension=$thumbnail->getClientOriginalExtension();
            $thumbnail->move('products-images', $fileName);
            $product->thumbnail='products-images/'.$fileName;
        }
    $product->save();
    return back();
    }
    public function deleteProduct($id){
        $product=Product::where('id',$id)->first();
        $product->delete();
        return back();
    }
}

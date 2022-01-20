<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Category;
use App\Setting;
use App\Post;
use App\Page;
use App\Message;
use App\Advertisement;


class FrontController extends Controller
{
    public function index(){
        $featured = Post::where('category_id', 'LIKE','%9%')
        ->orderBy('id', 'DESC')
        ->get();
        $general  = Post::where('category_id', 'LIKE','%10%')
        ->orderBy('id', 'DESC')
        ->get();
        $business  = Post::where('category_id', 'LIKE','%2%')
        ->orderBy('id', 'DESC')
        ->get();
        $sports  = Post::where('category_id', 'LIKE','%5%')
        ->orderBy('id', 'DESC')
        ->get();
        $technology  = Post::where('category_id', 'LIKE','%4%')
        ->orderBy('id', 'DESC')
        ->get();
        $health  = Post::where('category_id', 'LIKE','%8%')
        ->orderBy('id', 'DESC')
        ->get();
        $entertainment  = Post::where('category_id', 'LIKE','%3%')
        ->orderBy('id', 'DESC')
        ->get();
        $travel  = Post::where('category_id', 'LIKE','%6%')
        ->orderBy('id', 'DESC')
        ->get();
        $politics  = Post::where('category_id', 'LIKE','%1%')
        ->orderBy('id', 'DESC')
        ->get();
        $style  = Post::where('category_id', 'LIKE','%7%')
        ->orderBy('id', 'DESC')
        ->get();
        //return response()->json($featured);
        return view('frontend.index', compact(
                        'featured',
                        'general',
                        'business',
                        'sports',
                        'technology',
                        'health',
                        'travel',
                        'entertainment',
                        'politics',
                        'style'
                    ));
    }
    public function category($slug){
        $cat = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', 'LIKE', '%'.$cat->id.'%')->get();

        $latest =Post::where('status', 'published')
        ->orderBy('id', 'DESC')
        ->get();
        return view('frontend.category' ,compact('cat', 'posts', 'latest'));
    }
    public function page($slug)
    {
        # code...
        $page = Page::where('slug', $slug)->first();
        $latest =Post::where('status', 'published')
        ->orderBy('id', 'DESC')
        ->get();
        return view('frontend.page',compact('page', 'latest'));
    }
    public function post($slug){
        $post = Post::where('slug', $slug)->first();
        $views = $post->views;
        Post::where('slug', $slug)->update(['views'=>$views + 1]);
        $related =Post::where('category_id', 'LIKE', '%'.$post->category_id.'%')->get();
        $latest =Post::where('status', 'published')
        ->orderBy('id', 'DESC')
        ->get();
        return view('frontend.article',compact('post','related', 'latest'));
    }
    public function __construct(){

        $leaderboard =Advertisement::where('status', 'display')
        ->where('location', 'leaderboard')->orderby('id','DESC')->first();
        $sidebartop =Advertisement::where('status', 'display')
        ->where('location', 'sidebar-top')->orderby('id','DESC')->first();
        $sidebarbottom =Advertisement::where('status', 'display')
        ->where('location', 'sidebar-bottom')->orderby('id','DESC')->first();
        $quicklink = Page::where('status', 'published')->get();
        $latest_news = Post::where('status', 'published')->orderby('id','DESC')->first();
        $categories = Category::where('status', 'On')
               //->orderBy('name')
               //->take(7)
               ->get();
         $setting = setting::first();      
        View()->share([
            'categories' =>$categories,
            'setting'=> $setting,
            'latest_news'=>$latest_news,
            'quicklink' =>$quicklink,
            'leaderboard' =>$leaderboard,
            'sidebartop' =>$sidebartop,
            'sidebarbottom' =>$sidebarbottom,
        ]);
        
    }
    public function searchContent(){
       $url ='http://localhost:8000/post';
        $text =$_GET['text'];
 
      
        $data =Post::where('title', 'LIKE', '%'.$text.'%')->orwhere(
            'body','LIKE','%'.$text.'%')->get();

            $output ='';
            echo '<ul class ="search-result">';
            if(count($data) >0){
            foreach($data as $d){

                echo'<li><a href="'.$url.'/'.$d->slug.'">'.$d->title.'</a></li><hr>' ;

            } }else{
                echo'<li><a href="#">Sorry! No Data Found</a></li>' ;
            }
            echo '</ul>';
        return $output;
    }
    public function ContactUs()
    {
        $latest =Post::where('status', 'published')
        ->orderBy('id', 'DESC')
        ->get();
        # code...
        return view('frontend.contact-us', compact('latest'));
    }
    public function sendMsg(Request $request)
    {
        $validatedData = $request->validate([
            'name' 	=> 'required|max:100',
            'email' 	=> 'required|max:100',
            'phone' 	=> 'required|max:12',
            'body' 	=> 'required|unique:posts|max:300',
            
        ]);
        $input = $request->all();
        Message::create($input);
        Session::flash('message','Thank you for messeging us. We will get back to you shortly. Please keep patience');
        return redirect()->back();
    }
}

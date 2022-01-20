<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Session;
class adminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $published =  Post::where('status', 'published')->count();
        $posts =Post::orderby('id', 'DESC')->paginate(20);
        $postCount =Post::all();
        $categories =Category::all();
        return view('backend.post.index', compact('posts', 'categories','published','postCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('backend.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        if($file = $request->file('image')){


            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);

           


            $input['image'] = $name;


        }




        Post::create($input);



        Session::flash('message','Data  Successfully Created');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post= Post::findOrFail($id);
        $categories= Category::all();
        return view('backend.post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = Post::findOrFail($id);

            $input = $request->all();

        if($file = $request->file('image')){


            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $input['image'] = $name;


        }



        $user->update($input);
    
      Session::flash('message','Data  Successfully Updated');
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        if(isset($request->delete_all) && !empty($request->checkBoxArray)){


            $posts = Post::findOrFail($request->checkBoxArray);


            foreach($posts as $post){

                $post->delete();

            }


            return redirect()->back();


        } else {



            return redirect()->back();



        }














    }

 
}

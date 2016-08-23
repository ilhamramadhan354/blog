<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Validator;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class PostController
 *
 * @author  The scaffold-interface created at 2016-08-15 08:50:35am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class PostsController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validate = Validator::make($request->all(),Post::valid());
        if($validate->fails()){
            return back()->withErrors($validate)
                         ->withInput();
        }else{
            Post::create($request->all());
            session::flash('notice','success add article');
            return Redirect::to('posts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param        \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('posts/'.$id);
        }

        $post = Post::findOrfail($id);
        return view('posts.show')->with('posts', $post);
    } 

    /**
     * Show the form for editing the specified resource.
     * @param        \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('posts/'. $id . '/edit');
        }

        
        $post = Post::findOrfail($id);
        return view('posts.edit',compact('posts'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $validate = Validator::make($request->all(), Post::valid($id));

        if($validate->fails()) {

         return back()

         ->withErrors($validate)

         ->withInput();

        } else {

          $article = Post::find($id);

          $article->update($request->all());

          Session::flash('notice', 'Success update Post');

          return Redirect::to('posts'); 
        }
    }

    /**
     * Delete confirmation message by Ajaxis
     *
     * @link  https://github.com/amranidev/ajaxis
     * @param        \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/posts/'. $id . '/delete/');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$post = Post::findOrfail($id);
     	$post->delete();
        return URL::to('post');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Article;
use Validator;
use Session;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Redirect;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all(); //mendapatkan semua kolom articles
        return view('articles.index')->with('articles',$articles);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validate = Validator::make($request->all(),Article::valid());
        if($validate->fails()){
            return back()->withErrors($validate)
                         ->withInput();
        }else{


        $add = new Article();
        $add->title = $request['title'];
        $add->content = $request['content'];
        $add->author = $request['author'];

        $file       = $request->file('photo');
        $fileName   = $file->getClientOriginalName();
        $request->file('photo')->move("images/upload", $fileName);

        $add->photo = $fileName;
        $add->save();


            session::flash('notice','success add article');
            return Redirect::to('articles');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $article = Article::find($id);

    $comments = Article::find($id)->comments->sortBy('Comment.created_at');

    return view('articles.show')

      ->with('article', $article)

      ->with('comments', $comments);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('articles.edit')

        ->with('article', $article);
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
         $update = Article::where('id',$id)->first();
        $update->title = $request['title'];
        $update->content = $request['content'];
        $update->author = $request['author'];

        if($request->file('photo') == "")
        {
            $update->photo = $update->photo;
        }else{
            $file       = $request->file('photo');
            $fileName   = $file->getClientOriginalName();
            $request->file('photo')->move("images/upload", $fileName);
            $update->photo = $fileName;
        }

        $update->update();

        return redirect()->to('/articles');
    }  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/articles/'. $id . '/delete/');

        if($request->ajax())
        {
            return $msg;
        }
    }

     public function destroy($id)
    {
        $article = Article::findOrfail($id);
        $article->delete();
        
        return redirect()->to('/articles'); 
    }
}

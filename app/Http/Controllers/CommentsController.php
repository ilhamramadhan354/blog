<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Http\Requests;
  use App\Http\Controllers\Controller;
  use App\Comment;
  use App\Article;
  use Validator;
  use Session;
  use Redirect;

  class CommentsController extends Controller {

    public function store(Request $request)

    {

      $validate = Validator::make($request->all(), Comment::valid());

      if($validate->fails()) {

        return Redirect::to('articles/'. $request->article_id)

          ->withErrors($validate)

          ->withInput();

      } else {

        Comment::create($request->all());

        Session::flash('notice', 'Success add comment');

        return Redirect::to('articles/'. $request->article_id);

      }

    }

  }
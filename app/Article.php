<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{	
	public static function valid($id='') {

      return array(

        'title' => 'required|min:10|unique:articles,title'.($id ? ",$id" : ''),

        'content' => 'required|min:10|unique:articles,content'.($id ? ",$id" : ''),

        'author' => 'required',

        'photo' => 'required',

        'content' => 'required'

      );

    }
   
    protected $primaryKey = 'id';
	public $timestamps = true;
    protected $fillable = ['title','content','author','photo'];

    public function comments() {
        return $this->hasMany('App\Comment', 'article_id');    
    }
}

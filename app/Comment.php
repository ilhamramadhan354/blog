<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public static function valid() {

    return array(

      'content' => 'required|min:15',

    );

  }	
  
  protected $primaryKey = 'id';
  public $timestamps = true;
  protected $fillable = ['article_id','content','user'];

  public function article() {
    return $this->belongsTo('App\Article', 'article_id');
  }

}

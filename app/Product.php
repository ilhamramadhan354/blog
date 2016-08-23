<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public static function valid($id='') {

      return array(

        'name' => 'required|min:10|unique:products,name'.($id ? ",$id" : ''),

        'model' => 'required|min:10|unique:products,model'.($id ? ",$id" : ''),

        'photo' => 'required',

        'desc' => 'required'

      );

    }
    protected $primaryKey = 'id';
	public $timestamps = true;
    protected  $fillable = ['name','photo','model','decs']; 
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PostController
 *
 * @author  The scaffold-interface created at 2016-08-15 08:50:34am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Post extends Model
{
    public $timestamps = false;

    protected $table = 'posts';

	
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Posts
 *
 * @author  The scaffold-interface created at 2016-08-15 08:50:34am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('posts',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('title');
        
        $table->String('content');
        
        $table->String('author');
        
        $table->longText('desc');

        $table->timestamps();
        
        /**
         * Foreignkeys section
         */
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}

<?php

/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 21.10.16
 * Time: 17:09
 */
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{

    public function up(){
        Schema::create('cardowners', function(Blueprint $table){
            $table->increments('id');
            $table->string('card_num');
            $table->string('user_id');
            $table->timestamps();

        });
    }

    public function down(){
        Schema::drop('cardowners');
    }
}
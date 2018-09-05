<?php

/*
 * MAMY TO MANY POLYMORPHISM : Stands for sharing a table with multiple modles
 * [here
 *
 *      sharing TAG table with POST & VIDEO
 *
 * ]
 * */

use App\Post;
use App\Tag;
use App\Video;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){
   $post = Post::create(['name'=>'first shot1']);

   $tag = Tag::find(1);

   $post->tags()->save($tag);

    $video = Video::create(['name'=>'first_shot1.mp4']);

    $tag1 = Tag::find(2);

    $video->tags()->save($tag1);
});

Route::get('/update', function (){
    $post = Post::find(3);

    $post->whereid(1)->update(['name'=>'FS1']);

    $post->save();
});

Route::get('/read', function (){
    $post = Post::find(2);

    foreach ($post->tags as $p){
        echo $p->name;
    }
});

Route::get('/delete', function (){
   $post = Post::find(1);

   $post->whereid(1)->delete();
});

Route::get('/delete_tags', function (){
    $post = Post::find(2);

    foreach ($post->tags as $p){
        $p->whereid(1)->delete();
    }
});
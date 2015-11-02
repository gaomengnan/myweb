<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});

use App\Post;
use App\Comment;
Route::get('/user',array('as'=>'home_route', function(){
  $result = Post::with(['comment'=>function($query){$query->where('post_id','=',4);}])->get();

dd($result[0]->comment);
}));

Route::get('/test',function(){
$url = URL::route('home_route');

//dd($url);  dd==die;
  return Redirect::route('home_route');
});

Route::get('/comment',function(){

    $comment = Comment::create(['comment'=>'adadadad','post_id'=>4]);
    dd($comment);
});

Route::resource('post','PostController');




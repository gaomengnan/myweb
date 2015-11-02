<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
       protected $table='post';
       protected $guarded=[];
       public function comment(){
       return $this->hasMany('App\Comment','post_id');

       }
}

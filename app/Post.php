<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public static function getPostsFromRegion($array){
    return Post::whereIn('region_id', $array)->get(['post']);
  }
}

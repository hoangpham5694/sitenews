<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table = 'posts';
  protected $fillable = [
   'id','name','slug', 'created_at','description','content','cate_id','user_id','featured_at','view','share','created_at','updated_at','status','tags','title',
  ];
	public function category() {
	    return $this->belongsTo('App\Category','cate_id','id');
	}
}

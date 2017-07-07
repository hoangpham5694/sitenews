<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemPost extends Model
{
    protected $table = 'system_posts';
    protected $fillable = [
        'id','title','slug', 'created_at','description','content'
    ];
}

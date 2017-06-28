<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $table = 'softwares';
    protected $fillable = [
     'id','name','slug', 'created_at','description','content','system_id','cate_id','user_id','size','version','system_require','direct_link','crack_link','mirror_link1','mirror_link2','publisher_name','publisher_url','downloaded','view','share','created_at','updated_at','status','tags','title',
    ];
}

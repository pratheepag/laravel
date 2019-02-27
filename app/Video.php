<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
	protected $table = "videos";
	protected $fillable = ['videourl'];
	
	public function Articles()
    {
        return $this->belongsToMany('App\Article', 'article_video', 'video_id', 'article_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    //
	protected $table = "audios";
	protected $fillable = ['name'];
	
	public function Articles()
    {
        return $this->belongsToMany('App\Article', 'article_audio', 'audio_id', 'article_id');
    }
}

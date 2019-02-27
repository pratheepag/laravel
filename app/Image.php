<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
	protected $fillable = ['name'];
	
	public function Articles()
    {
        return $this->belongsToMany('App\Article', 'article_image', 'image_id', 'article_id');
    }
}

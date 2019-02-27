<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
	protected $fillable = ['description', 'type'];
	
	public function images(){
		return $this->belongsToMany('App\Image');
	}
	
	public function audios(){
		return $this->belongsToMany('App\Audio');
	}
	
	public function videos(){
		return $this->belongsToMany('App\Video');
	}
}

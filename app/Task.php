<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

	protected $fillable = [ 'body' , 'isCom'];

    public static function isComplete(){
    	return static::where('isCom' , 0)->get();
    }
    public  function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function user(){
    	return $this->belongsTo(User::class);
    }
}

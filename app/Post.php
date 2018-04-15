<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use  Carbon\Carbon;
class Post extends Model
{
    use Sluggable;
    protected $fillable = [ 'title' , 'body' ];
    public function getPosts(){
        $posts = Post::all();
        return $posts;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function getCreatedAtAttribute($value){
        return  Carbon::parse($value)->format('l jS \\of F Y h:i:s A');
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

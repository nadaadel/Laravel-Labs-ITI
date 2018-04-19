<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{

   
    public function store($id)

    {
    	Comment::create([ 
            'body' => request('body'),
            'post_id' => $id,
            'user_id' => Auth::user()->id
            ]);
            
    	return redirect('/post/'.$id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{

   
    public function store($id)

    {
    	Comment::create([ 
            'body' => request('body'),
            'task_id' => $id,
            'user_id' => 1
    		]);
    	return back();
    }
}

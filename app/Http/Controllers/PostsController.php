<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;


class PostsController extends Controller
{
    public  function __constract(){
        $this->middleware('auth' , ['except' => 'create' , 'getAdd'] );
    }
    public function index(){
        $posts = Post::orderBy('id', 'asc')->paginate(3);
        return view('posts.list' , compact('posts'));
    }
    public function create(StorePostRequest $request){
  
        $input = $request->only(['title' , 'body']);
        $input->user_id = Auth::user()->id;
        $newPost = new Post();
        $newPost->title  = $request->input('title');
        $newPost->user_id  =  $user_id;
        $newPost->body  = $request->input('body');
        $newPost->save();
        return redirect('/posts');
    }

    public function getAdd(){
        $users = User::all();
        return view('posts.add' , compact('users'));
    }
    public function getUpdate($id){
        $post = Post::find($id);
        return view('posts.edit' , compact('post'));
    }
    public function show($id){
        $post = Post::find($id);
        return view('posts.show' , compact('post'));
    }
    public function update(UpdatePostRequest $request , $id){
       $update = Post::find($id);
       $update->title = $request->title;
       $update->body = $request->body;
       $update->slug = null;
       $update->save();
        return redirect('/posts');
    } 
    
    public function destroy($id){
       $del = Post::find($id);
       $del->delete();
       return redirect('/posts');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Storage;


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
        // $input = $request->only(['title' , 'body']);
        // $input->user_id = Auth::user()->id;
        $newPost = new Post();
        $newPost->title  = $request->input('title');
        $newPost->user_id  =  Auth::user()->id;
        $newPost->body  = $request->input('body');
        $path = $request->file('image')->store('public/uploads');
        $newPost->image = $path;  
        // $photoName->store('public/uploads');
        // Storage::disk('local')->put('imaget', $photoName);
        // Storage::disk('local')->put($photoName, file_get_contents($request->file('image')));
    // $photo->move(public_path('uploads'), $photoPath);
        // $newPost->attachTag('tag3');
        $newPost->save();

       return redirect('/posts')
;
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
        $comments = Comment::all()->where('post_id' , $id);
        return view('posts.show' , compact('post' , 'comments'));
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

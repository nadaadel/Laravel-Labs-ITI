<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;


class TasksController extends Controller
{
    public function index(){
	$tasks = Task::all();
	return view('tasks' , compact('tasks'));
}
   public function getTask($id){

	$task = Task::find($id);

	return view('tasks.show' , compact('task'));

   }
    public function create(){
    	return view('tasks.create');
    }
    public function save(Request $request){
    	$this->validate($request , [
    		'body' => 'required|max:20',
    		'complete' => 'required'
    		]);
    	Task::create(request(['body' , 'title']));
    	return redirect('/tasks');

    }
    public function update(Request $request , $id){

    }
}

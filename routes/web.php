<?php
Route::get('login/github', 'Auth\SocialusersController@redirectToProvider')->name('loginGithub');
Route::get('login/github/callback', 'Auth\SocialusersController@handleProviderCallback');
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/posts' , 'PostsController@index');
Route::get('/post/create' , 'PostsController@getAdd')->middleware('auth');
Route::post('/post/store' , 'PostsController@create')->middleware('auth');
Route::get('/post/edit/{id}' , 'PostsController@getUpdate')->middleware('auth');
Route::get('/post/{id}' , 'PostsController@show')->middleware('auth');
Route::post('/post/edit/{id}' , 'PostsController@update')->middleware('auth');		
Route::delete('/post/delete/{id}' , 'PostsController@destroy')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/post/comments/create/{id}' , 'CommentController@store');

/*

use App\Task;
// Route::get('/login', 'SessionController@create')->name('login');
// Route::get('/register', 'RegisterController@create')->name('regitser');
Route::get('/logout', 'SessionController@destory')->name('logout');
Route::get('/tasks/create' , 'TasksController@create');
Route::post('/tasks/create' , 'TasksController@save');

Route::get('/about' , function(){
	$name = 'Nada';
	return view('about' , compact('name'));
});
Route::get('/tasks/{id}' , 'TasksController@getTask');
Route::post('/tasks/{id}/comment' , 'CommentController@store');
Route::get('/tasks' , 'TasksController@index');


*/

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function create(){

    }
    public function destory(){
    	auth()->logout();
    	return redirect()->home();
    }

}

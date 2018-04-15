<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public  function __constract(){
        $this->middleware('auth' , ['except' => 'index'] );
    }
    public function index(){
        return view('home');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;  

class SocialusersController extends Controller
{
    use AuthenticatesUsers;
    
    // public function __construct(){
    //     $this->middleware('auth:socialuser');
    // }

    protected $guard = 'socialuser';
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        // $user->token;
    }
}

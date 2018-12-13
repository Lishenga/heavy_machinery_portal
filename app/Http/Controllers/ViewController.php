<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ViewController extends Controller
{
    //

    public function index(Request $request)
    {
        
        return view('login');
    }

    public function signin(Request $request){

        $email = $request->email;
        $pass = $request->password;
        $user = User::where('email',$email)->first();
        
        if (Auth::attempt(['email' => $email, 'password' => $pass])) {

            return view('dashboard')->with([
                'user'=>$user,
            ]);
             
         }
        return redirect()->back();

    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');

    }
}

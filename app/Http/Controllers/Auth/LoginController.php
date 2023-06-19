<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller{
  


    public function login(){
        

        $credentials = $this->validate(request(), [
            "username" => "required|string",
            "password" => "required|string",
        ]);

        

        if(Auth::attempt($credentials)){
            return redirect()->route("inicio");
        }

        return back()->withErrors(["username" => trans("auth.failed")]);

    }

    public function logout(){
        Auth::logout();
        return redirect("/");
    }

}

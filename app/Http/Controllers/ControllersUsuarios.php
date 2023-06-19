<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class ControllersUsuarios extends Controller{

    public function get(){

        return DB::table("users")->select("users.id", "users.names", "users.surnames", "users.ci", "users.username", "profiles.name")
            ->join("profiles", "profiles.id", "=", "users.profile_id")
            ->where("users.profile_id", "=", "1")
            ->where("users.active", "=", 1)
            ->get();

         
    }

    public function create(Request $request){


        $userValidateCi = DB::table('users')->where('ci', "=", "$request->ci")->get();

        if(count($userValidateCi) != 0){

            return response()->json(['msg' => 'Cedula de identidad ya registrada'], 402);

        }

        $userValidateUsername = DB::table('users')->where('username', "=", "$request->username")->get();

        if(count($userValidateUsername) != 0){

            return response()->json(['msg' => 'Nombre de usuario ya registrado'], 402);

        }

        $user = new User();
        $user->names =  $request->names;
        $user->surnames =  $request->surnames;
        $user->username =  $request->username;
        $user->ci =  $request->ci;
        $user->password =  bcrypt($request->password);
        $user->profile_id =  1;
        $user->active =  1;
        $user->save();

        return $user;
    }

    public function update(Request $request){

        $user = User::findOrFail($request->id);
        $user->names =  $request->names;
        $user->surnames =  $request->surnames;
        $user->username =  $request->username;
        $user->ci =  $request->ci;
        if($user->password != null){
        $user->password =  bcrypt($request->password);
        }
        $user->save();

        return $user;

    }


    public function destroy(Request $request){
        $user = User::findOrFail($request->id);
        $user->active = 0;
        $user->save();
        return $user;
    }


   
    
}

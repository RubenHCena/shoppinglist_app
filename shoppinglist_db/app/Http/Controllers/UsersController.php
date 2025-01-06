<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getAll() {
        $users=User::all();
        return $users;
    }

    public function store(Request $request){
        $user = new user;
        //$user->user_id = $request->user_id;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return $user;
    }
}

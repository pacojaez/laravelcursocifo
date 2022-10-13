<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    //
    public function index(){

        $users = User::orderBy('id', 'ASC')->withCount('bikes')->get();

        return view('users.list', [
            'users' => $users
        ]);
    }
}

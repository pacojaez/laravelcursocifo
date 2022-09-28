<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController
{
    /*
    * fallback route in web.php
    */
    public function index(){
        return view('welcome');
    }

}

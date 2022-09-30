<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class WelcomeController
{
    /*
    * fallback route in web.php
    */
    public function index(){

        return view( 'welcome' );
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function showIndex(){

        return view('home.index');
    }

    public function registerIndex(){

        return view('home.register');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function showIndex(){

        return view('user.index');
    }

    public function registerIndex(){

        return view('user.register');
    }

    // public function updateIndex(){

    //     return view('user.modify');
    // }

}

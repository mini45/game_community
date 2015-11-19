<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use Auth;

class MainController extends Controller{

    public function getLogout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function getHome()
    {
        return view('views.home');
    }
}
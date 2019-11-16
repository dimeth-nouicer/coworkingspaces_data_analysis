<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Story;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user->id = auth()->user()->id;
       
       // return $user->id;
       // $user = User::find(1);
       // logger('Debug message');
        return view('home'); //->with('story', $user->story) ;
        //return view('home');
    }
}

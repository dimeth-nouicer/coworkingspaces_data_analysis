<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;

class blogController extends Controller
{
    //
    public function getIndex(){
        $stories = Story::paginate(10);
        //return 123;
        return view('blog.index')->withStories($stories);
    }
    public function getSingle($slug){
        //fetch from the DB based on slug
        $story= Story::where('slug','=',$slug)->first();

        //return the view and pass in the post object
        return view('blog.single')->withStory($story);

    }
}

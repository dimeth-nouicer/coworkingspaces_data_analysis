<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunitySpace;

class CommunityController extends Controller
{
    //
    public function postProfile(Request $request){
        $request->validate([
            'name' => 'max:255',
            'fb' => 'required|unique:CommunitySpace|max:255',
            'twitter' => 'required|unique:CommunitySpace|max:255',
        ]);

        $CommunitySpace = new CommunitySpace;
        $CommunitySpace->name = $request->name;
        $CommunitySpace->fb = $request->fb;
        $CommunitySpace->twitter = $request->twitter;
        $CommunitySpace->user_id = 1;
        $CommunitySpace->save();
        return response()->json(['CommunitySpace' => $CommunitySpace],201);
      //  return  response()->json('success',204);

    }
    
}

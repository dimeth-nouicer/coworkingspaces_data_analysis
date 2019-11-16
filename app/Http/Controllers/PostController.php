<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use JWTAuth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  /*  public function _construct(){
        $this->middleware('auth', ['except'=> [ 'index', 'show','create' ] ] );
    }*/
    /*public function PostStory(Request $request)
    {
        //
        if( ! $user = JWTAuth::parseToken()->authenticate() ){
            return response()->json(['message' => 'User not found!'],404);
        }
        $story = new Story;
        $story->title = $request->title;
        $story->body = $request->body;
        $story->slug = $request->title;

        $story->user_id = auth()->user()->id;
        $story->save();
        
       
       return response()->json(['story' => $story],201);
    }*/

    public function index()
    {
        //
        
        $stories= Story::all();
       // return view('story.index')->withstories($stories);
       return $stories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
    /*     //
        //return view('story.create');
        if( ! $user = JWTAuth::parseToken()->authenticate() ){
            return response()->json(['message' => 'User not found!'],404);
        }
        $story = new Story;
        $story->title = $request->title;
        $story->body = $request->body;
        $story->slug = $request->title;

        $story->user_id = auth()->user()->id;
        $story->save();
        
       
       return response()->json(['story' => $story],201);*/
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* if( ! $user = JWTAuth::parseToken()->authenticate() ){
            return response()->json(['message' => 'User not found!'],404);
        }*/
        //validate the data
        $request->validate([
            'title' => 'required|unique:stories|max:255',
            'body' => 'required',
           // 'slug' => 'required|alpha_dash|min:5|max:255',
        ]);
     
        //store in the database
        $story = new Story;
        $story->title = $request->title;
        $story->body = $request->body;
        $story->slug = $request->title;
      //  $story->user_id = auth()->user()->id;
      $story->user_id = 1;
        $story->save();
        //redirect to another page
       // return redirect()->route('story.show',$story->id);
       // return $story;
       return response()->json(['story' => $story],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $story = Story::find($id);
        //return view('story.show')->withStory($story);
        return $story;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $story = Story::find($id);
       // return view('story.edit')->withStory($story);
       return $story;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //validate the data
         $story = Story::find($id);
         if($request->input('title') == $story->title ) {
            $request->validate([
                //'title' => 'required|max:255|unique:stories,slug',
                'body' => 'required',
            ]);
         }else{
            $request->validate([
                'title' => 'required|max:255|unique:stories,title',
                'body' => 'required',
               // 'slug' => 'required|alpha_dash|min:5|max:255|unique:stories,slug',
            ]);
           
         }
         
        //store in the database
        $story = Story::find($id);
        $story->title = $request->title;
        $story->body = $request->body;
        $story->slug = $request->title;
        $story->save(); //return '123';
       
        //redirect to another page
       // return redirect()->route('story.show',$story->id);
       return $story;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $story = Story::find($id);
        $story->delete();
      //  return redirect('/story')->with('success','deleted!');
      return response()->json('success', 204);
    
    }
}

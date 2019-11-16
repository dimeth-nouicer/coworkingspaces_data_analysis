<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Story;
use Mail;
use App\Http\Controllers\Session;
use App\Http\Controllers\Route;
Use Redirect;

class PageController extends Controller {
   /* public function getIndex(){
        $stories = Story::orderBy('created_at','desc')->limit(4)->get();
        return view('home');
    }*/
    public function getAbout(){
        /*$first = 'Marwen';
        $last = 'Degla';
        $full = $first . " " . $last;
        $email = "marwen.hmidi@gmail.com";
        $data['email'] = $email;
        $data['full'] = $full;*/
        $info = "We are young coworkers who seek to create a community of Communiters. Communiters are people who love being in community 
        spaces. 
        While we were browsing internet to find websites for cowoerkers, we found coworker.com. This website connects coworkers from the 
        whole world. But there are many other spaces like fablabs who still are unknown. This is how we got the idea to create a website that helps
        connect community spaces seeks from all over the world.";
        return response()->json('about', $info);
    }
    public function getContact(){
    
        return view('pages.contact');//->withData($data) ;
    }
    public function postContact(Request $request){
        $this->validate($request, ['email' => 'required|email',
                                    'subject' => 'min:3',
                                    'message' => 'min:10'] );
        $data = array( 
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
         );
         
        Mail::send('emails.contact',$data, function($message) use($data) {
            $message->from($data['email']);
            $message->to('hello@gmail.com');
            $message->subject($data['subject']);
        }); 
     //  $route = Route::get('/', 'PageController@getIndex');

       // $request->session()->flash('success', 'email sent!');
    //    return redirect('/');
    return response()->json('success', 204);
        
    }

}
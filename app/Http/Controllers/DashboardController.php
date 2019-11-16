<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use App\influence;
class DashboardController extends Controller
{
    //
    public function userTimeline($user){
        /*Artisan::exec('get:timeline', [ 'text' => 'StartupHausTUN' ]);
        return response()->json('success', 204);*/
        
        $process = new Process("php artisan get:timeline {$user}");
        $process->run();
        
        //return response()->json('success', 204);
    }
    public function userEngagement(Request $request){
        $user = $request->user;
        userTimeline($user);
        $competitor = $request->competitor;
        userTimeline($competitor);
        $user_id=9;
        /* $process = new Process("get:engagement {$user} {$competitor}");
         $process->run();
         return $process->getOutput();*/
         $influence = influence::find($user_id);
         return $influence;
    }
    public function influence(){
        //--------Openfab---------//
        $followers = 206;
        $connections=1191438;
        $avgFollowers=5783.68;
        $favorited=213;
        $retweeted=214;
        //--------ELspace---------//
        $followers1 = 161;
        $connections1=675186;
        $avgFollowers1=4193.7;
        $favorited1=112;
        $retweeted1=477;
        //--------Cogite---------//
        $followers2 = 3440;
        $connections2=4876337;
        $avgFollowers2=1417.54;
        $favorited2=565;
        $retweeted2=1183;
        return response()->json(['followers' => $followers,
                                  'connection' => $connections,
                                  'avgfollowers' => $avgFollowers,
                                  'favorited' => $favorited,
                                  'retweeted' => $retweeted,
                                  'followers1' => $followers1,
                                  'connections1' => $connections1,
                                  'avgfollowers1 ' => $avgFollowers1,
                                  'favorited1' => $favorited1,
                                  'retweeted1' => $retweeted1,
                                  'followers2' => $followers12,
                                  'connections2' => $connections2,
                                  'avgfollowers2 ' => $avgFollowers2,
                                  'favorited2' => $favorited2,
                                  'retweeted2' => $retweeted2]);
    }
    public function followers(){
        //--------ELspace---------//
        $followers1=206;
        $friends1=189;
        $mutual1=48;
        $notfollowing1=141;
        $followedback1= 158;
        //--------Openfab---------//
        $followers2=161;
        $friends2=412;
        $mutual2=61;
        $notfollowing2=351;
        $followedback2= 100;
        //--------Cogite---------//
        $followers3=3439;
        $friends3=2390;
        $mutual3=692;
        $notfollowing3=1698;
        $followedback3= 2747;
        return response()->json(['followers1' => $followers1,
                                  'friends1' => $friends1,
                                  'mutual1' => $mutual1,
                                  'notfollowing1' => $notfollowing1,
                                  'followedback1' => $followedback1,
                                  'followers2' => $followers2,
                                  'friends2' => $friends2,
                                  'mutual2' => $mutual2,
                                  'notfollowing2' => $notfollowing2,
                                  'followedback2' => $followedback2,
                                  'followers3' => $followers3,
                                  'friends3' => $friends3,
                                  'mutual3' => $mutual3,
                                  'notfollowing3' => $notfollowing3,
                                  'followedback3' => $followedback3]);
    }
    
    
}
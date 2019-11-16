<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException ;
use JWTAuth;

class UserController extends Controller
{
    public function signup(Request $request)
    {
        
        //validate the data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
     
        //store in the database
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        session(['id' => $id,
                 'name' => $request->input('name')]);
        return response()->json([
            'message' => 'Succefully created user!'
        ], 201);
           
    }

    public function signin(Request $request)
    {
        
        //validate the data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        $credentials = $request->only('email','password');
        try{
            if( !$token = JWTAuth::attempt($credentials)){
                return response()->json([
                    'error' => 'Invalid credentials!'
                ],401);
            }
        } catch(JWTException $e) {
            return response()->json([
                'error' => 'Coul not create token!'
            ],500);
        }
        session(['id' => $id,
                 'name' => $request->input('name')]);
        return response()->json([
            'token' => $token
        ], 200);
    }

    public function index(){
        $users = User::all();
        return $users;
    }

    public function show(){
        $id = session('id');
        $user = User::findOrFail($id);
        return $user;
    }
    
    public function update($id){
        //validate the data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        if($user->save()){
            session(['id' => $id, 'name' => $request->input('name')]);
            return response()->json([
                'message' => 'Succefully created user!'
            ], 201);
        }else{
            return response()->json([
                'message' => 'Could not create user!'
            ], 500);
        }
        
    }

    
}
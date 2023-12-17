<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(UserLoginRequest $request){
        // return "yes you hit it";
        if(!$token = JWTAuth::attempt($request->only(['email', 'password']))){
            return response()->json([
                'errors' => [
                    'message' => ['Sorry we cant find you with those details.'],
                ],
            ], 422);
        }

        
        return redirect('/websocket-page?token=' . $token);
        // return redirect('/websocket-page')->with('token', $token);

        // $redirectUrl = '/websocket-page';

        // $userData = new UserResource($request->user());

        // return redirect($redirectUrl)->with('userData', $userData)->with('token', $token);

        // return (new UserResource($request->user()))->additional([
        //     'meta' => [
        //         'token' => $token,
        //     ],
        // ]);
    }
    
    // public function login(UserLoginRequest $request){
    //     $credentials = $request->only(['email', 'password']);

    //     if (!$token = JWTAuth::attempt($credentials)) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    //     return response()->json(['token' => $token]);
    // }

    // Get the authenticated User
    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function dataset() {
        return User::all();
    }
}

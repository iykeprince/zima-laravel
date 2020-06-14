<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\ShopModels\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'first_name' => 'required | max:255',
            'last_name' => 'required | max:255',
            'email' => 'required | email | unique:users',
            'phone_number' => 'required ',
            'password' => 'required | min:4',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'register_ip' => request()->ip(),
        ]);

        $credentials = $request->only(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'data' => $user, 
            'message' => 'Successfully registered', 
            'token' => $token,
            'isLoggedIn' => true], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Invalid login credential'], 401);
        }

        return response()->json([
            'token' => $token,
            'isLoggedIn' => true,
        ], 200);
    }

    public function loginFacebook(Request $request){
        dd($request->all());
    }

    public function loginGoogle(Request $request){
        dd($request->all());
    }

    public function getAuthUser(Request $request)
    {
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException  $e) {
            // if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
            //     return response()->json(['token_expired'], $e->getStatusCode());
            // }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
            //     return response()->json(['token_invalid'], $e->getStatusCode());
            // }else{
            //     return response()->json(['error'=>'Token is required']);
            // }
            return response()->json($e->getMessage());
        }
        return response()->json($user);
    }
    
    public function getShop(){
        $user = auth()->user()->id;
        $shop = Shop::with('market')->where('user_id', $user)->first();
        return response()->json($shop);
    }

    public function refresh()
    {
        $token = auth()->refresh();

        return response()->json([
            'token' => $token,
            'isLoggedIn' => true,
        ]);
    }

    public function logout(Request $request)
    {
        auth('api')->logout();
        return response()->json([
            'isLoggedIn' => false,
            'token' => null,
            'message' => 'User logged out successfully'
        ]);
    }
}

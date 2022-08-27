<?php

namespace App\Http\Controllers\AdminAPI;

use App\Models\User;
use App\Models\AccessToken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            if (RateLimiter::tooManyAttempts(request()->ip(), 3)) {
                return response()->json(
                    [ 'message' => 'Too many fail login attempt your ip has restricted for 5 minutes.' ], 
                    Response::HTTP_UNAUTHORIZED
                );
            }

            $user = User::where('email', $request->email)->first();
            $check = null;
            if ($user) {
                $check = Hash::check($request->password, $user->password);
            }

            if (!$check) {
                RateLimiter::hit(request()->ip(), 300);
                return response()->json([ 'message' => 'Invalid credential' ], Response::HTTP_UNAUTHORIZED);
            }
            
            $accessToken = AccessToken::updateOrCreate(
                [ 'user_id' => $user->id ],
                [ 'access_token' => Str::random(255) ]
            );

            RateLimiter::clear(request()->ip());
            return response()->json([ 'access_token' =>  $accessToken->access_token ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function logout(Request $request)
    {
        try {
            $accessToken = AccessToken::where('access_token', $request->access_token)->first();
            if ($accessToken) {
                $accessToken->delete();
                return response()->json([ 'success' => true ]);
            }
            
            return response()->json([ 'success' => false ]); 
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

<?php

namespace App\Http\Controllers\AdminAPI;

use App\Models\User;
use App\Models\AccessToken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return response()->json([ 'message' => 'Invalid credential' ]);
            }

            $check = Hash::check($request->password, $user->password);
            if (!$check) {
                return response()->json([ 'message' => 'Invalid credential' ]);
            }
            
            $accessToken = AccessToken::updateOrCreate(
                [ 'user_id' => $user->id ],
                [ 'access_token' => Str::random(64) ]
            );
            return response()->json([ 'access_token' =>  $accessToken->access_token ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

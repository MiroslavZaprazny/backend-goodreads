<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function create(Request $request)
    {
        if (!Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]
        )) {
            return response([
                'message' => 'Invalid credentails',
                'status' => '401'
            ]);
        }

        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24);
        return response([
            'message' => 'You have been logged in',
            'user' => $user,
        ])->withCookie($cookie);
    }

    public function destroy(Request $request)
    {
        $cookie = Cookie::forget('jwt');
        return response([
            'message' => 'You have been logged out'
        ])->withCookie($cookie);
    }

    public function user()
    {
        if (!Auth::user()) {
            return response([
                'message' => 'Invalid session',
                'status' => 401
            ]);
        }
        return Auth::user();
    }

    public function update(User $user)
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'email|required',
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->messages();
        }

        $user->name = request('name');
        $user->email = request('email');
        $user->save();

        return response()->json([
            'user' => $user,
            'message' => 'You have successfully updated your profile'
        ]);
    }
}

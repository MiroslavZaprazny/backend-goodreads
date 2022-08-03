<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:4',
            'password_confirmation' => 'required|min:4'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'validate_err' => $validate->messages()
            ]);
        }

        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return [
            'status' => '200',
            'message' => 'Your account was created!'
        ];
    }
}

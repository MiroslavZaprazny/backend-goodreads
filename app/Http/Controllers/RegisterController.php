<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        User::create([
            'email' => $request->email,
            'password' => $request->password
        ]);
        return [
            'status' => 'ok',
            'message' => 'User was added successfully'
        ];
    }
}

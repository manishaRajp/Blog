<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    //login api

    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin || !Hash::check($request->password, $admin['password'])) {
            return response([
                'message' => ['These Password and Email does not match.']
            ]);
        }

        return response([
            'token' => $admin->createToken('MyApp')->accessToken,
            'user' => $admin
        ]);
    }
}

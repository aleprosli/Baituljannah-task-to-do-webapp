<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //login - email & password

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $token = auth()->user()->createToken('API')->accessToken;

            return response()->json([
                'success' => true,
                'message' => 'You have successfully login',
                'data' => auth()->user()
            ]);
        }
        else
        {
        //else return response wrong credential
            return response()->json([
                'success' => false,
                'message' => 'Please check your credentials'
            ]);
        }
    }

    public function register(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'min:5',
            'email' => 'required|unique:users',
            'password' => 'min:5'
        ]);

        //store to DB using User Model
        //name,email,password

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password),'api_token' => Str::random(60),]);
        //return success

        return response()->json([
            'success' => true,
            'message' => 'Successfully register new account',
            'data' => $user
        ]);
    }
}

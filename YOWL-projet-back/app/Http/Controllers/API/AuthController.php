<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;

class AuthController extends Controller
{
    /**
     * Register a new user
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password) 
        ]);

        return response()->json([
            "status" => true,
            "message" => "user created successfully"
        ]);
    }

    /**
     * Login user and create token
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|'
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            // L'utilisateur avec cet email n'existe pas
            return response()->json([
                'status' => false,
                'message' => 'Email incorrect'
            ], 401);
        }
    
        if (!Hash::check($request->password, $user->password)) {
            // Le mot de passe est incorrect
            return response()->json([
                'status' => false,
                'message' => 'Mot de passe incorrect'
            ], 401);
        }
    
        // Les informations d'identification sont correctes
        $token = $user->createToken('MyApp')->accessToken;
    
        return response()->json([
            'status' => true,
            'message' => 'est connecté avec succès',
            'token' => $token
        ]);
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        return response()->json([
            "status" => true,
            "message" => "profile information",
            "data" => $user
        ]);
    }

    /**
     * Logout user and revoke token
     */
    public function logout(Request $request)
    {
        auth()->user()->token()->revoke();
        return response()->json([
            'status' => true,
            'message' => 'Successfully logged out'
        ]);
    }
}

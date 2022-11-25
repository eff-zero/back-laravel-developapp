<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if (empty($user)) {
            return response()->json(['message' => 'Usuario no registrado'], 404);
        }

        if (!(Hash::check($request->password, $user->password))) {
            return response()->json(['message' => 'Usuario o contraseña incorrecta'], 404);
        }

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'message' => '¡Inicio de sesión exitoso!',
            'auth_token' => $token,
            'type' => 'Bearer',
            'user' => $user
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(
            [
                'message' => 'Sesión cerrada exitosamente'
            ]
        );
    }
}

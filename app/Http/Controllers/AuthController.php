<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsuarioCollection;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            /*verificacion del usuario y password en la base 2*/
            $pass = md5($request->password);
            $validacion = Usuario::where('correo', $request->email)->where('clave', $pass)->where('estado', 1)->get();
            if ($validacion->count()>0) {
                $success = $user->createToken($user->name)->accessToken;
                return response()->json([
                    'access_token' => $success,
                    'token_type' => 'Bearer'
                ], 200);  
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            /**************************************************/
            /*$success = $user->createToken($user->name)->accessToken;
            return response()->json([
                'access_token' => $success,
                'token_type' => 'Bearer'
            ], 200);*/
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function getUser()
    {
        return response()->json(auth()->user());
    }
}

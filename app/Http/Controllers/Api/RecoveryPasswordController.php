<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class RecoveryPasswordController extends Controller
{

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        if (!User::where('email', $request->email)->exists()) {
            return response()->json([
                'message' => 'No existe una cuenta con ese correo'
            ], 404);
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return response()->json([
            'message' => 'Te enviamos un enlace para recuperar tu contraseña'
        ], 200);
    }

    /**
     * Resetear contraseña
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only(
                'email',
                'password',
                'password_confirmation',
                'token'
            ),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        if ($status !== Password::PASSWORD_RESET) {
            return response()->json([
                'message' => 'Token inválido o expirado'
            ], 400);
        }

        return response()->json([
            'message' => 'Contraseña actualizada correctamente'
        ], 200);
    }

}
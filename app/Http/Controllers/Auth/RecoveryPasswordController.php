<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class RecoveryPasswordController extends Controller
{

    public function showResetForm(string $token)
    {
        return view('Auth.reset-password', [
            'token' => $token
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', 'Contraseña actualizada')
            : back()->withErrors(['email' => __($status)]);
    }


    public function showForgotForm()
    {
        return view('Home.ForgotPassword');
    }

    public function sendResetLink(Request $request)
    {
    $request->validate([
        'email' => 'required|email'
    ]);

    if (!User::where('email', $request->email)->exists()) {
        return back()->withErrors([
            'email' => 'No existe una cuenta con ese correo'
        ]);
    }

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return back()->with('status', 
        'Te enviamos un enlace para recuperar tu contraseña'
    );
}
}
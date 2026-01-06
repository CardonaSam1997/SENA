<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');        
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'Credenciales inválidas']);
        }

        $user = Auth::user();
        
        return match ($user->role) {
            'company'  => redirect()->route('bussines.create'),
            'admin' => redirect()->route('gestion'),
            'professional'  => redirect()->route('professional.notification'),
            default => abort(403),
        };
    }
}
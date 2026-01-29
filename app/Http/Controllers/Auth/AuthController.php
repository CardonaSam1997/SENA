<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            'company' => redirect()->route('company.tasks.create'),
            'admin' => redirect()->route('admin.main'),
            'professional' => redirect()->route('professional.notification'),
            'pending' => redirect()->route('register.role', ['user' => $user->id]),
            default => abort(403),
        };
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;

class UserController extends Controller {

public function store(Request $request): JsonResponse
{
    $validated = $request->validate([
        'username' => 'required|string|max:100',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:6',
    ], [
        'username.required' => 'El nombre de usuario es obligatorio',
        'email.required' => 'El correo electrónico es obligatorio',
        'email.email' => 'El correo electrónico no es válido',
        'email.unique' => 'El correo electrónico ya está en uso',
        'password.required' => 'La contraseña es obligatoria',
        'password.confirmed' => 'Las contraseñas no coinciden',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres',
    ]);

    $exists = User::where('username', $validated['username'])
        ->orWhere('email', $validated['email'])
        ->exists();

    if ($exists) {
        return response()->json([
            'message' => 'El nombre de usuario o el email ya está en uso'
        ], 409);
    }

    $user = User::create([
        'username' => $validated['username'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => 'pending',
        'completed' => false,
    ]);

    return response()->json([
        'message' => 'Usuario creado correctamente',
        'data' => $user
    ], 201);
}

public function changePassword(Request $request): JsonResponse
{
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|min:6|confirmed',
    ], [
        'current_password.required' => 'Debes ingresar tu contraseña actual.',
        'password.required' => 'Debes ingresar una nueva contraseña.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->current_password, $user->password)) {
        return response()->json([
            'message' => 'La contraseña actual es incorrecta'
        ], 401);
    }

    if (!$user instanceof User) {
        return response()->json(['error' => 'Usuario no autenticado'], 401);
    }


    $user->update([
        'password' => Hash::make($request->password),
    ]);

    return response()->json([
        'message' => 'Contraseña actualizada correctamente'
    ], 200);
}



public function updateRole(Request $request, User $user): JsonResponse
{
    if ($user->role !== 'pending' || $user->completed) {
        return response()->json([
            'message' => 'No se puede cambiar el rol de este usuario'
        ], 403);
    }

    $data = $request->validate([
        'role' => 'required|in:professional,company'
    ]);

    $user->update([
        'role' => $data['role']
    ]);

    return response()->json([
        'message' => 'Rol asignado correctamente',
        'user' => $user
    ]);
}



}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function indexLogin(){
        return view('Home.FormLogin');
    }

    public function store(Request $request){        
        $request->validate([
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

        if($request->password !== $request->password_confirmation){
            return back()->withErrors(['password' => 'Las contraseñas no coinciden'])->withInput();
        }
        
        $existeName = User::where('username', $request->username)->orWhere('email', $request->email)->exists();
        if($existeName){
            return back()->withErrors(['username' => 'El nombre de usuario o el email ya está en uso'])->withInput();
        }
        
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pending',
            'completed' => false,
        ]);

        return redirect()->route('register.role', ['user' => $user->id]);
    }    


    public function changePassword(Request $request)
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
            return back()->withErrors([
                'current_password' => 'La contraseña actual es incorrecta.',
            ]);
        }

        if (!$user instanceof User) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('password_changed', true);
    }
}
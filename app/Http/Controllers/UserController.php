<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function indexLogin(){
        return view('Home.FormLogin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(User $apply_task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $apply_task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $apply_task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $apply_task)
    {
        //
    }
}
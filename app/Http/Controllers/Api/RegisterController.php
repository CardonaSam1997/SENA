<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Professional;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

public function store(Request $request): JsonResponse
{
    $validator = Validator::make($request->all(), [
        'username' => 'required|string|max:255|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    $user = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'pending',
        'completed' => false,
    ]);

    return response()->json([
        'message' => 'Usuario creado',
        'user_id' => $user->id
    ], 201);
}

public function selectRole(User $user): JsonResponse
{
    if ($user->role !== 'pending') {
        return response()->json([
            'message' => 'El usuario no está autorizado para seleccionar rol'
        ], 403);
    }

    if ($user->completed) {
        return response()->json([
            'message' => 'El usuario ya completó el registro'
        ], 403);
    }

    return response()->json([
        'message' => 'Seleccione rol',
        'data' => [
            'user_id' => $user->id,
            'roles_disponibles' => ['professional', 'company']
        ]
    ], 200);
}

public function storeProfessional(Request $request, User $user): JsonResponse
{
    $validator = Validator::make($request->all(), [
        'document' => 'required|string|max:20|unique:professionals,document',
        'name' => 'required|string|max:100',
        'last_name' => 'required|string|max:100',
        'address' => 'required|string|max:255',
        'experience' => 'required|integer|min:0',
        'service_type' => 'required|string|max:30',
        'academic_education' => 'required|string|max:150',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    if ($user->role !== 'professional') {
        return response()->json([
            'message' => 'El usuario no tiene rol profesional'
        ], 403);
    }

    if ($user->professional()->exists()) {
        return response()->json([
            'message' => 'El usuario ya tiene un perfil profesional registrado'
        ], 409);
    }


    $professional = Professional::create([
        'user_id' => $user->id,
        'document' => $request->document,
        'name' => $request->name,
        'last_name' => $request->last_name,
        'address' => $request->address,
        'birth_date' => $request->birth_date,
        'description' => $request->description,
        'gender' => $request->gender,
        'age' => $request->age,
        'academic_education' => $request->academic_education,
        'experience' => $request->experience,
        'service_type' => $request->service_type,
    ]);

    $user->update([
        'role' => 'professional',
        'completed' => true,
    ]);

    return response()->json([
        'message' => 'Profesional registrado correctamente',
        'professional' => $professional
    ], 201);
}

public function storeCompany(Request $request, User $user): JsonResponse
{
    $validator = Validator::make($request->all(), [
        'nit' => 'required|string|max:15|unique:companies,nit',
        'name' => 'required|string|max:50',
        'address' => 'required|string|max:100',
        'service_type' => 'required|string|max:30',
        'web' => 'nullable|url|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    if ($user->role !== 'company') {
        return response()->json([
            'message' => 'El usuario no tiene rol company'
        ], 403);
    }

    if ($user->company()->exists()) {
        return response()->json([
            'message' => 'El usuario ya tiene un perfil company registrado'
        ], 409);
    }

    $company = Company::create([
        'user_id' => $user->id,
        'nit' => $request->nit,
        'name' => $request->name,
        'address' => $request->address,
        'service_type' => $request->service_type,
        'web' => $request->web,
    ]);

    $user->update([
        'role' => 'company',
        'completed' => true,
    ]);

    return response()->json([
        'message' => 'Empresa registrada correctamente',
        'company' => $company
    ], 201);
}

}
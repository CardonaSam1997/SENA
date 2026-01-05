<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Professional;
use App\Models\Company;

class RegisterController extends Controller
{

    public function formProfessional(User $user) {
        return view('Home.FormProfessional', compact('user'));
    }

    public function formCompany(User $user) {
        return view('Home.FormCompany', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        return redirect()->route('Home.FormRol', ['user' => $user->id]);
    }

    public function selectRole(User $user){
        if ($user->completed) {
            abort(403);
        }
        return view('Home.FormRol', compact('user'));
    }
   
    public function storeProfessional(Request $request, User $user){                
        $request->validate([
            'document' => 'required|string|max:20|unique:professionals,document',
            'name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'birth_date' => 'nullable|date',
            'address' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'service_type' => 'required|string|max:30',
            'document_photo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'academic_education' => 'required|string|max:150',
            'gender' => 'string|size:1',
            'age' => 'nullable|string|max:255',
            'curriculum' => 'nullable|file|mimes:pdf|max:5120'
        ], [
            'document.required' => 'El número de documento es obligatorio',
            'document.unique' => 'Este documento ya está registrado',
            'academic_education.required' => 'La formación académica es obligatoria',
            'name.required' => 'El nombre es obligatorio',
            'last_name.required' => 'El apellido es obligatorio',
            'birth_date.date' => 'La fecha de nacimiento debe ser una fecha válida',
            'address.required' => 'La dirección es obligatoria',
            'experience.required' => 'La experiencia es obligatoria',
            'service_type.required' => 'El tipo de servicio es obligatorio',
            'document_photo.file' => 'El documento debe ser un archivo válido',
            'curriculum.file' => 'El curriculum debe ser un archivo válido'
        ]);        

        $documentPhotoPath = $request->file('document_photo')?->store('professionals/documents', 'public');
        $curriculumPath = $request->file('curriculum')?->store('professionals/curriculums', 'public');
        
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
            'document_photo' => $documentPhotoPath,
            'curriculum' => $curriculumPath,
        ]);

        $user->update([
            'role' => 'professional',
            'completed' => true,
        ]);

        #return redirect()->route('dashboard')->with('success', 'Registro profesional completado correctamente');
        return redirect()->route('professional.notification');        
    }
        
    public function storeCompany(Request $request, User $user)
    {
        $request->validate([
            'nit' => 'required|string|max:15|unique:companies,nit',
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:100',
            'service_type' => 'required|string|max:30',
            'web' => 'nullable|url|max:255',
        ], [
            'nit.required' => 'El NIT es obligatorio',
            'nit.unique' => 'El NIT ya está registrado',
            'name.required' => 'El nombre de la empresa es obligatorio',
            'address.required' => 'La dirección es obligatoria',
            'service_type.required' => 'El tipo de servicio es obligatorio',
            'web.url' => 'La página web debe ser una URL válida',
        ]);
     
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

        #return redirect()->route('dashboard')->with('success', 'Registro de empresa completado correctamente');
        return redirect()->route('bussines.create');
    }
    


}
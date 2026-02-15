<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfessionalController extends Controller
{
   
   
    public function show(Professional $professional)
    {
        return view('professionals.show', compact('professional'));
    }

    public function profile()
    {
        $user = Auth::user();
        $professional = $user->professional;

        return view('professionals.show', compact('user', 'professional'));
    }

    public function update(Request $request)
    {
        
    $user = Auth::user();
    $professional = $user->professional;

    $request->validate([
        'name' => 'required|string|max:100',
        'last_name' => 'required|string|max:100',
        'address' => 'required|string|max:255',
        'email' => 'required|email|max:100|unique:users,email,' . $user->id,
        'service_type' => 'nullable|string|max:30',
        'description' => 'nullable|string|max:255',
        'curriculum' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
    ]);
    
    /** @var \App\Models\User $user */
    $user->update([
        'email' => $request->email
    ]);

    // Manejo de archivo
    if ($request->hasFile('curriculum')) {

        // Eliminar archivo anterior si existe
        if ($professional->curriculum &&
            Storage::disk('public')->exists($professional->curriculum)) {
            Storage::disk('public')->delete($professional->curriculum);
        }

        $filePath = $request->file('curriculum')
                            ->store('curriculums', 'public');

        $professional->curriculum = $filePath;
    }

    // Actualizar profesional
    $professional->update([
        'name' => $request->name,
        'last_name' => $request->last_name,
        'address' => $request->address,
        'service_type' => $request->service_type,
        'description' => $request->description,
        'curriculum' => $professional->curriculum
    ]);

    return back()->with('success', 'Perfil actualizado correctamente.');
}
}

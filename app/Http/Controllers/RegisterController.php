<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use app\Models\Professional;
use App\Models\Company;

class RegisterController extends Controller
{

    public function selectRole(User $user){
        if ($user->completed) {
            abort(403);
        }

        return view('register.select-role', compact('user'));
    }
   
    public function storeProfessional(Request $request, User $user){
        $request->validate([
            'document' => 'required|unique:professionals',
            'name' => 'required',
            'last_name' => 'required',
        ]);

        Professional::create([
            'user_id' => $user->id,
            'document' => $request->document,
            'name' => $request->name,
            'last_name' => $request->last_name,
        ]);

        $user->update([
            'role' => 'professional',
            'completed' => true,
        ]);

        return redirect()->route('professional.notification');
    }

    public function storeCompany(Request $request, User $user){
        $request->validate([
            'nit' => 'required|unique:companies',
            'name' => 'required',
        ]);

        Company::create([
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

        return redirect()->route('bussines.create');
    }

}
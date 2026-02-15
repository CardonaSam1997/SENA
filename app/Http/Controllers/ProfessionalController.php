<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}

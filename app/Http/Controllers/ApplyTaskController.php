<?php

namespace App\Http\Controllers;

use App\Models\ApplyTask;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Professional;
use Illuminate\Support\Facades\Auth;

class ApplyTaskController extends Controller
{

    public function authorize(Task $task, Professional $professional)
    {
        abort_if(
            $task->company_id !== Auth::user()->company->id,
            403
        );

        $application = ApplyTask::where('task_id', $task->id)
            ->where('professional_id', $professional->id)
            ->firstOrFail();

        $application->update([
            'authorization' => true,
        ]);
        $task->update([
        'state' => 'asignada',
        ]);

        return back()->with('authorized', true);
    }

    public function alreadyAppli($idTask){
        $professionalId = Auth::user()->professional->id;

        $alreadyApplied = ApplyTask::where('professional_id', $professionalId)
            ->where('task_id', $idTask)
            ->exists();
        return $alreadyApplied;
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Task $task)
    {
        $professionalId = Auth::user()->professional->id;
    
        $alreadyApplied = ApplyTask::where('professional_id', $professionalId)
            ->where('task_id', $task->id)
            ->exists();

          if ($alreadyApplied) {
        return response()->json([
            'success' => false,
            'message' => 'Ya aplicaste a esta tarea.'
        ]);
    }

        ApplyTask::firstOrCreate(
            [
                'professional_id' => $professionalId,
                'task_id' => $task->id,
            ],
            [
                'authorization' => false,
                'score' => 0,
            ]
        );

        
    return response()->json([
        'success' => true,
        'message' => 'Aplicación enviada correctamente.'
    ]);
    
    }
   
}
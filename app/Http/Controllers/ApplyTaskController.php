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

        return back()->with('authorized', true);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Task $task)
    {
        $professionalId = Auth::user()->professional->id;

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

        return back()->with('success', 'Aplicación enviada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(ApplyTask $apply_task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApplyTask $apply_task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApplyTask $apply_task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApplyTask $apply_task)
    {
        //
    }
}
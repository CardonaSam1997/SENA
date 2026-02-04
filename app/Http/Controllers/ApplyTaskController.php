<?php

namespace App\Http\Controllers;

use App\Models\ApplyTask;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Professional;

class ApplyTaskController extends Controller
{

    public function authorize(Task $task, Professional $professional)
    {
        abort_if(
            $task->company_id !== auth()->user()->company->id,
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
    public function store(Request $request)
    {
        //
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
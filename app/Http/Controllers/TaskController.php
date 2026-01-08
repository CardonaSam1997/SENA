<?php

namespace App\Http\Controllers;
  
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
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
        return view('empresa.crearTarea');
    }

    /**
     * Store a newly created resource in storage.
     */
  

    public function store(Request $request)
    {        
        $request->validate([
            'title'           => 'required|string|max:255',
            'content'         => 'required|string',
            'area'            => 'required|string|max:255',
            'money'           => 'required|numeric|min:0',
            'expiration_date' => 'required|date',
            'files.*'         => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $storedFiles = [];

        try {
            DB::transaction(function () use ($request, &$storedFiles) {

                $task = Task::create([
                    'company_id'      => auth()->user()->company->id,
                    'title'           => $request->title,
                    'content'         => $request->content,
                    'area'            => $request->area,
                    'money'           => $request->money,
                    'expiration_date' => $request->expiration_date,
                    'state'           => 'pendiente',
                    'enable'          => true,
                ]);

                if ($request->hasFile('files')) {
                    foreach ($request->file('files') as $file) {

                        $path = $file->store(
                            'tasks/' . $task->id,
                            'public'
                        );

                        $storedFiles[] = $path;

                        $task->files()->create([
                            'path' => $path,
                        ]);
                    }
                }
            });

            return redirect()
                ->route('company.tasks.create')
                ->with('success', 'Tarea creada correctamente');

        } catch (\Throwable $e) {

            foreach ($storedFiles as $path) {
                Storage::disk('public')->delete($path);
            }

            throw $e;
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}

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
     * Muestra todas las publicaciones que tienen el estado pendiente
     * y que tienen una fecha superior al dia actual
     */
    public function indexProfessional()
    {
        $tasks = Task::where('enable', true)
            ->where('state', 'pendiente')
            ->whereDate('expiration_date', '>=', now())
            ->latest()
            ->get();

        return view('professionals.tasks.index', compact('tasks'));
    }


    public function index()
    {
        $company = Auth::user()->company;
        $tasks = Task::where('company_id', $company->id)
            ->where('enable', true)->where('state', '!=', 'Finalizada')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('empresa.verTarea', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empresa.CrearTarea');
    }

    /**
     * Permite la creacion de una tarea (publicar)
     */
    public function store(Request $request)
    {        
        $request->validate([
            'title'           => 'required|string|max:255',
            'content'         => 'required|string',
            'area'            => 'required|string|max:255',
            'money'           => 'required|numeric|min:0',
            'expiration_date' => 'required|date|after_or_equal:today',
            'files.*'         => 'nullable|file|mimes:pdf|max:2048',
        ], [
            'expiration_date.after_or_equal' => 'La fecha de vencimiento debe ser mayor o igual a hoy.',
        ]);

        $storedFiles = [];

        try {
            DB::transaction(function () use ($request, &$storedFiles) {

                $task = Task::create([
                    'company_id'      => Auth::user()->company->id,
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
                ->with('success', 'Tarea creada correctamente')
                ->with('task_created', $request->title);


        } catch (\Throwable $e) {

            foreach ($storedFiles as $path) {
                Storage::disk('public')->delete($path);
            }

            throw $e;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if ($task->company_id !== Auth::user()->company->id) {
            abort(403);
        }

        $task->load('files');

        return view('empresa.task.EditTask', compact('task'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if ($task->company_id !== Auth::user()->company->id) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'money' => 'required|numeric|min:0',
            'content' => 'required|string',
            'area' => 'required|string',
            'expiration_date' => 'required|date',
        ]);

        $task->update($validated);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('tasks/' . $task->id, 'public');

                $task->files()->create([
                    'path' => $path,
                ]);
            }
        }
        
        $task->load('files');
        return view('empresa.task.EditTask', [
            'task' => $task,
            'updated' => true,
        ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if ($task->company_id !== Auth::user()->company->id) {
            abort(403, 'No autorizado');
        }

        $task->delete();

        return redirect()
            ->back()
            ->with('success', 'Tarea eliminada correctamente');
    }
    

    public function tareasAutorizadas()
    {
        $professional = Auth::user()->professional;

        $tasks = Task::whereHas('professionals', function ($query) use ($professional) {
            $query->where('professional_id', $professional->id)
                ->where('authorization', true);
        })->get();

        return view('professionals.tasks.tasksAutorize', compact('tasks'));
    }


public function show(Task $task)
{
    $professional = Auth::user()->professional;

    $authorized = $task->professionals()
        ->where('professional_id', $professional->id)
        ->wherePivot('authorization', true)
        ->exists();

    if (!$authorized) {
        abort(403);
    }

    $task->load('files');

    return view('professionals.tasks.show', compact('task'));
}

}
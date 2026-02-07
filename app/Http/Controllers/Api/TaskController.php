<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function indexApi(): JsonResponse
    {
        $company = Auth::user()->company;                

       $tasks = Task::with('files')
        ->where('company_id', $company->id)
        ->where('enable', true)
        ->where('state', '!=', 'Finalizada')
        ->orderByDesc('id')
        ->get();

        return response()->json([
            'tasks' => $tasks
        ]);
    }

   
public function updateApi(Request $request, int $taskId): JsonResponse
{
    $company = Auth::user()->company;

    // Validar que la tarea exista y pertenezca a la empresa
    $task = Task::where('id', $taskId)
        ->where('company_id', $company->id)
        ->first();

    if (!$task) {
        return response()->json([
            'message' => 'La tarea no existe o no pertenece a su empresa'
        ], 404);
    }

    $validated = $request->validate([
        'title'           => 'sometimes|string|max:255',
        'content'         => 'sometimes|string',
        'area'            => 'sometimes|string|max:255',
        'money'           => 'sometimes|numeric|min:0',
        'expiration_date' => 'sometimes|date|after_or_equal:today',
        'files.*'         => 'sometimes|file|mimes:pdf|max:2048',
    ]);

    $storedFiles = [];

    try {
        DB::transaction(function () use ($task, $validated, $request, &$storedFiles) {

            // 🔹 Update parcial
            if (!empty($validated)) {
                $task->update($validated);
            }

            // 🔹 Archivos opcionales
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

        return response()->json([
            'message' => 'Tarea actualizada correctamente',
            'task' => $task->load('files')
        ]);

    } catch (\Throwable $e) {

        foreach ($storedFiles as $path) {
            Storage::disk('public')->delete($path);
        }

        return response()->json([
            'message' => 'Error al actualizar la tarea',
            'error' => $e->getMessage()
        ], 500);
    }
}


    public function destroyApi(Task $task): JsonResponse
    {
        if ($task->company_id !== Auth::user()->company->id) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $task->delete();

        return response()->json([
            'message' => 'Tarea eliminada'
        ]);
    }

    

public function storeApi(Request $request): JsonResponse
{
    $validated = $request->validate([
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
        $task = DB::transaction(function () use ($request, $validated, &$storedFiles) {

            $task = Task::create([
                'company_id'      => Auth::user()->company->id,
                'title'           => $validated['title'],
                'content'         => $validated['content'],
                'area'            => $validated['area'],
                'money'           => $validated['money'],
                'expiration_date' => $validated['expiration_date'],
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

            return $task->load('files');
        });

        return response()->json([
            'message' => 'Tarea creada correctamente',
            'task' => $task
        ], 201);

    } catch (\Throwable $e) {

        foreach ($storedFiles as $path) {
            Storage::disk('public')->delete($path);
        }

        return response()->json([
            'message' => 'Error al crear la tarea',
            'error' => $e->getMessage()
        ], 500);
    }
}


}
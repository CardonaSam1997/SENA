<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class TestTaskComplete extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'tasks:test-complete';

    /**
     * The console command description.
     */
    protected $description = 'Marca una tarea como finalizada para probar Observer y Notification';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $task = Task::first();

        if (!$task) {
            $this->error('No existen tareas en la base de datos');
            return Command::FAILURE;
        }

        $task->state = 'finalizada';
        $task->save(); 

        $this->info("La tarea ID {$task->id} fue marcada como finalizada");

        return Command::SUCCESS;
    }
}

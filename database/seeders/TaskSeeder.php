<?php
namespace Database\Seeders;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TaskSeeder extends Seeder {
    public function run(): void {
        Task::factory()->count(3)->create(['company_id' => 1]);
        Task::factory()->count(3)->create(['company_id' => 2]);
    }
}

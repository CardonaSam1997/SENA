<?php
namespace Database\Seeders;
use App\Models\ApplyTask;
use Illuminate\Database\Seeder;

class ApplyTaskSeeder extends Seeder {
    public function run(): void {
        ApplyTask::insert([
            [
                'professional_id' => 1,
                'task_id' => 1,
                'authorization' => false,
                'score' => 80,
            ],
            [
                'professional_id' => 1,
                'task_id' => 2,
                'authorization' => true,
                'score' => 90,
            ],
        ]);
    }
}

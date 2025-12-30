<?php
namespace Database\Seeders;
use App\Models\File;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder {
    public function run(): void {
        File::insert([
            ['task_id' => 1, 'path' => 'files/doc1.pdf'],
            ['task_id' => 1, 'path' => 'files/doc2.pdf'],
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplyTask extends Model
{
    protected $table = 'apply_tasks';
    
    public $incrementing = false;
    protected $primaryKey = null;

    protected $fillable = [
        'professional_id',
        'task_id',
        'authorization',
        'suggestion',
        'score',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }
}
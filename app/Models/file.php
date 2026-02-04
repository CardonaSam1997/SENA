<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['task_id', 'path'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    // helper útil
    public function getUrlAttribute()
    {
        return Storage::disk('public')->url($this->path);
    }
}
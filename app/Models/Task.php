<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'company_id',
        'title',
        'content',
        'area',
        'state',
        'enable',
        'money',
        'expiration_date',
    ];

    protected $casts = [
        'expiration_date' => 'date',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function applyTasks()
    {
        return $this->hasMany(ApplyTask::class);    
    }


public function professionals()
{
    return $this->belongsToMany(
        Professional::class,
        'apply_tasks',
        'task_id',
        'professional_id'
    )->withPivot(
        'authorization',
        'suggestion',
        'score',
        'delivery_file',
        'delivered_at',
        'paid',
        'paid_at'
    )->withTimestamps();
}
}
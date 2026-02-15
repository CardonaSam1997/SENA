<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Professional extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id',
        'document',
        'name',
        'last_name',
        'birth_date',
        'address',
        'description',
        'experience',
        'gender',
        'age',
        'service_type',
        'document_photo',
        'curriculum',
        'academic_education',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(
            Task::class,
            'apply_tasks',
            'professional_id',
            'task_id'
        )->withPivot('authorization', 'suggestion', 'score')
        ->withTimestamps();
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
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

}
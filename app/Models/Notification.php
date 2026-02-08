<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;


class Notification extends DatabaseNotification
{
    protected $keyType = 'string';
    public $incrementing = false;
}

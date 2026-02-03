<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BellNotification extends Component
{
    public bool $hasUnread;

    public function __construct()
    {
        $this->hasUnread = auth()->check()
            && auth()->user()->unreadNotifications()->exists();
    }

    public function render()
    {
        return view('components.bell-notification');
    }
}

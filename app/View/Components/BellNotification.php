<?php

namespace App\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

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

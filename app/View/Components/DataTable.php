<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataTable extends Component
{
    public $id;

    public function __construct($id = 'tabla')
    {
        $this->id = $id;
    }

    public function render()
    {
        return view('components.data-table');
    }
}
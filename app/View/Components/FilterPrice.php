<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FilterPrice extends Component
{
    public $data;

    public $type;

    public function __construct($type, $data)
    {
        $this->data = $data;

        $this->type = $type;
    }

    public function render()
    {
        $data = $this->data;

        $type = $this->type;

        return view('components.filter-price', compact('data', 'type'));
    }
}

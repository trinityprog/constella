<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FilterColor extends Component
{
    public $data, $type, $slug;

    public function __construct($type, $data, $slug)
    {
        $this->data = $data;
        $this->type = $type;
        $this->slug = $slug;
    }

    public function render()
    {
        $data = $this->data;
        $type = $this->type;
        $slug = $this->slug;

        return view('components.filter-color', compact('data', 'type', 'slug'));
    }
}

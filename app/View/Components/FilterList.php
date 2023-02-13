<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FilterList extends Component
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
        $data = array_filter($this->data);
        $type = $this->type;
        $slug = $this->slug;

        asort($data);

        return view('components.filter-list', compact('data', 'type', 'slug'));
    }
}

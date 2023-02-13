<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Search extends Component
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        $data = $this->data;
        return view('components.search', compact('data'));
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SectionCollections extends Component
{
    public $section;

    public function __construct($section)
    {
        $this->section = $section;
    }

    public function render()
    {
        return view('components.section-collections');
    }
}

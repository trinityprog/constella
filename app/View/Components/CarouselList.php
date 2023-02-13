<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CarouselList extends Component
{
    public $list, $title, $link, $button;

    public function __construct($list, $title, $link, $button)
    {
        $this->list = $list;
        $this->title = $title;
        $this->link = $link;
        $this->button = $button;
    }

    public function render()
    {
        return view('components.carousel-list');
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Promocode extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $order_id;
    public $promocode;

    public function __construct($orderPromocode = null, $orderId = null)
    {
        $this->order_id = $orderId;
        $this->promocode = $orderPromocode ?? session('promocode');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.promocode', [
            'promocode' => $this->promocode,
            'order_id' => $this->order_id
        ]);
    }
}

<?php

namespace App\View\Components;

use App\Models\Event;
use Illuminate\View\Component;

class PaymentSidebar extends Component
{

    public $event;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.Payment.payment-sidebar');
    }
}

<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Sidebar extends Component
{

    public $tab;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tab)
    {
        $this->tab = $tab;
    }

    public function isActiveTab($tab)
    {
        return $tab == $this->tab;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dashboard.sidebar');
    }
}

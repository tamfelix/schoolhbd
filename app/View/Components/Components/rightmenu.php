<?php

namespace App\View\Components;

use Illuminate\View\Component;

class rightmenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $sidemenu;
    public $director;
    public function __construct($sidemenu, $director)
    {
        $this->sidemenu = $sidemenu;
        $this->director = $director;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.rightmenu');
    }
}

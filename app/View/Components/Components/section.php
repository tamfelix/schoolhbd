<?php

namespace App\View\Components;

use Illuminate\View\Component;

class section extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $label;
    public $url;
    public function __construct($label, $url)
    {
        $this->label = $label;
        $this->url = $url;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.section');
    }
}

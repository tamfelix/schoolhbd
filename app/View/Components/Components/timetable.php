<?php

namespace App\View\Components;

use Illuminate\View\Component;

class timetable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $timetable;
    public function __construct($timetable)
    {
        $this->timetable = $timetable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.timetable');
    }
}

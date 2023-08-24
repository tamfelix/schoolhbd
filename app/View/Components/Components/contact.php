<?php

namespace App\View\Components;

use Illuminate\View\Component;

class contact extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
//    public $name;
//    public $surname;
//    public $email;
//    public $subject;
//    public $content;
    public function __construct()
    {
//        $this->name = $name;
//        $this->surname = $surname;
//        $this->email = $email;
//        $this->subject = $subject;
//        $this->content = $content;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.contact');
    }
}

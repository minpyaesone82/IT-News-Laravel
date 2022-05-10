<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuItem extends Component
{
    public $name,$class,$counter,$link;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$class,$counter="",$link)
    {
        $this->name = $name;
        $this->link = $link;
        $this->class = $class;
        $this->counter = $counter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu-item');
    }
}

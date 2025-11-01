<?php

namespace App\View\Components;

use routes\bookcrossing\vendor\laravel\framework\src\Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \routes\bookcrossing\vendor\laravel\framework\src\Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}

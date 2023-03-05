<?php

namespace App\View\Components\section;

use Illuminate\View\Component;

class pricingFeatures extends Component
{

    public $dark;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dark)
    {
        $this->dark = $dark;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.section.pricing-features');
    }
}

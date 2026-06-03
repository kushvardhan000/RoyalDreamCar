<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CarCard extends Component
{
    /**
     * The car instance.
     */
    public $car;

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\Car  $car
     * @return void
     */
    public function __construct($car)
    {
        $this->car = $car;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.car-card');
    }
}
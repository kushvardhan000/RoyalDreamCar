<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CarFilterForm extends Component
{
    /**
     * The brands collection.
     */
    public $brands;

    /**
     * The models collection.
     */
    public $models;

    /**
     * The fuel types collection.
     */
    public $fuelTypes;

    /**
     * The transmissions collection.
     */
    public $transmissions;

    /**
     * The years collection.
     */
    public $years;

    /**
     * The ownerships collection.
     */
    public $ownerships;

    /**
     * The current request instance.
     */
    public $request;

    /**
     * Create a new component instance.
     *
     * @param  \Illuminate\Support\Collection  $brands
     * @param  \Illuminate\Support\Collection  $models
     * @param  \Illuminate\Support\Collection  $fuelTypes
     * @param  \Illuminate\Support\Collection  $transmissions
     * @param  \Illuminate\Support\Collection  $years
     * @param  \Illuminate\Support\Collection  $ownerships
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(
        $brands,
        $models,
        $fuelTypes,
        $transmissions,
        $years,
        $ownerships,
        $request
    ) {
        $this->brands = $brands;
        $this->models = $models;
        $this->fuelTypes = $fuelTypes;
        $this->transmissions = $transmissions;
        $this->years = $years;
        $this->ownerships = $ownerships;
        $this->request = $request;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.car-filter-form');
    }
}
<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Image extends Component
{
    /**
     * The image path or URL.
     */
    public $path;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $path
     * @return void
     */
    public function __construct(?string $path = null)
    {
        $this->path = $path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.image');
    }
}
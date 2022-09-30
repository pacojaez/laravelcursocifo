<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Bike;

class BikeSearch extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $marcas = Bike::select('marca')->groupBy('marca')->get();

        return view('components.bike-search', ['marcas' => $marcas ]);
    }
}

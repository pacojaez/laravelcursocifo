<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Bike;

class Herobig extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $bike = Bike::where('marca', 'Yamaha')->first();

        $bikes = Bike::orderByRaw('RAND()')->take(4)->get();
// dd($bikes);
        return view('components.herobig')
                    ->with('bike', $bike)
                    ->with('bikes', $bikes);
    }
}
